<?php

namespace App\Services\UserModule;

use App\Dtos\UserModule\UserDto;
use App\Entities\CollectionWithPagination\CollectionWithPagination;
use App\Entities\UserModule\User;
use App\Models\User as ModelsUser;
use App\Repositories\UserModule\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserModuleService {

    public function __construct(
        private readonly UserRepository $userRepository
    )
    {}

    public function findById(int $id): UserDto
    {
        $user = $this->userRepository->findById($id);

        if(is_null($user)) {
            throw new NotFoundHttpException('el usuario no existe', null, Response::HTTP_NOT_FOUND);
        }

        return UserDto::toDTO($user);
    }

    public function findByEmail(string $email): UserDto
    {
        $user = $this->userRepository->findByEmail($email);

        if(is_null($user)) {
            throw new NotFoundHttpException("user does not exists or credentials are invalid", null, Response::HTTP_NOT_FOUND);
        }
        return UserDto::toDTO($user);
    }

    public function update(UserDto $userDto): bool
    {
        $user = User::toEntity($userDto);
        return $this->userRepository->update($user);
    }

    public function getPaginatedCollection(int $pageSize, int $pageNumber, string $searchKeyword = ""): CollectionWithPagination
    {
        $result = $this->userRepository->getPaginatedCollection($pageSize, $pageNumber, $searchKeyword);

        return new CollectionWithPagination(
            data: $result['data'],
            currentPage: $result['current_page'],
            nextPage: $result['next_page'],
            lastPage: $result['last_page'],
            perPage: $result['per_page'],
            total: $result['total'],
        );
    }

    public function delete(int $id): int
    {
        $userDto = $this->findById($id);
        $user = User::toEntity($userDto);
        return $this->userRepository->delete($user);
    }
}
