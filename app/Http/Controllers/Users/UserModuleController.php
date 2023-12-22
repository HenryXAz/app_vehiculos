<?php

namespace App\Http\Controllers\Users;

use App\Dtos\Auth\RegisterDTO;
use App\Dtos\UserModule\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserModule\UserModuleStoreRequest;
use App\Http\Requests\UserModule\UserModuleUpdateRequest;
use App\Services\AuthService\AuthService;
use App\Services\UserModule\UserModuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TypeError;

class UserModuleController extends Controller
{
    private const DEFAULT_PAGE_NUMBER = 1;
    private const DEFAULT_PAGE_SIZE = 10;

    public function __construct(
        private readonly UserModuleService $userModuleService,
        private readonly AuthService $authService,
    ) {
    }

    public function index(Request $request): View | RedirectResponse
    {
        try {
            $pageSize = ($request->has('page_size') ? $request->query('page_size') : self::DEFAULT_PAGE_SIZE);
            $pageNumber = ($request->has('page_number') ? $request->query('page_number') : self::DEFAULT_PAGE_NUMBER);
            $users = $this->userModuleService->getPaginatedCollection($pageSize, $pageNumber);
            return view('pages.users-module.index', compact('users'));
        } catch (\Throwable $th) {
            if ($th instanceof TypeError) {
                return redirect(route('users.index'))->withErrors([
                    'error_type' => 'número de pagina o número de registros es inválido'
                ]);
            }

            abort(500);
        }
    }

    public function create()
    {
        return view('pages.users-module.create');
    }

    public function store(UserModuleStoreRequest $request)
    {
        try {
            $data = json_decode(json_encode($request->only(['name', 'email', 'password', 'role', 'status'])));
            $registerDTO = RegisterDTO::makeRegisterDTO($data);

            $userSaved = $this->authService->register($registerDTO);

            return redirect(route('users.index'));
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function edit(string $email)
    {
        try {
            $user = $this->userModuleService->findByEmail($email);
            session()->put('user_id', $user->id);
            return view('pages.users-module.edit', compact('user'));
        } catch (\Throwable $th) {
            if ($th instanceof  NotFoundHttpException) {
                return redirect(route('users.index'))->withErrors(['error_type' => $th->getMessage()]);
            }
        }
    }

    public function update(UserModuleUpdateRequest $request)
    {

        $data = json_decode(json_encode($request->only(['name', 'email', 'role', 'status'])));
        $id = session()->get('user_id');
        session()->forget('user_id');

        $userDto = UserDto::makeDTO($data, $id);
        $user = $this->userModuleService->update($userDto);

        return redirect(route('users.index'));
    }

    public function search(Request $request): View | RedirectResponse
    {
        try {
            $searchKeyword = '%' . $request->search . '%';
            $pageSize = ($request->has('page_size') ? $request->query('page_size') : self::DEFAULT_PAGE_SIZE);
            $pageNumber = ($request->has('page_number') ? $request->query('page_number') : self::DEFAULT_PAGE_NUMBER);
            $users = $this->userModuleService->getPaginatedCollection($pageSize, $pageNumber, $searchKeyword);

            request()->session()->regenerateToken();
            return view('pages.users-module.index', compact('users'));
        } catch (\Throwable $th) {
            if ($th instanceof  TypeError) {
                return redirect(route('users.index'))
                    ->withErrors([
                        'error_type' => 'número de pagina o número de registros es inválido'
                    ]);
            }
        }
    }

    public function destroy(int $id)
    {
        $userDeleted = $this->userModuleService->delete($id);

        return redirect(route('users.index'));
    }
}
