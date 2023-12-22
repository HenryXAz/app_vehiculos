<?php

namespace App\Repositories\UserModule;

use App\Dtos\UserModule\UserDto;
use App\Entities\UserModule\User;
use Illuminate\Support\Facades\DB;

class UserRepository {
  
    public function findById(int $id): ?User
    {
        $sql = DB::select('SELECT id, name, email, status, role FROM users WHERE id=:id', [
            "id" => $id,
        ]);

        if(empty($sql)) {
            return null;
        }

        return User::makeUser($sql[0]);
    }

    public function findByEmail(string $email): ?User
    {
        $sql = DB::select('SELECT id, name, email, status, role FROM users WHERE email=:email', [
            "email" => $email,
        ]);

        if(empty($sql)) {
            return null;
        }

        return User::makeUser($sql[0]);
    }

    public function update(User $user): bool
    {
    
        DB::update('UPDATE users SET name=:name,email=:email, role=:role, status=:status WHERE id=:id', [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'status' => $user->status,
            'id' => $user->id,
        ]);

       return true;
    }

    public function getPaginatedCollection(int $pageSize, int $pageNumber, string $searchKeyword): array
    {
        $usersDB = DB::select('CALL `SP_USERS_WITH_PAGINATION`(:page_size, :page_number, @current_page, @next_page, @last_page, @per_page, @total, :search_keyword)', [
            'page_size' => $pageSize,
            'page_number' => $pageNumber,
            'search_keyword' => $searchKeyword,
        ]);
        $currentPage = DB::select('SELECT @current_page');
        $nextPage = DB::select('SELECT @next_page');
        $lastPage = DB::select('SELECT @last_page');
        $perPage = DB::select('SELECT @per_page');
        $total = DB::select('SELECT @total');

        $users = [];

        foreach($usersDB as $userDB) {
            $users[] = UserDto::makeDTO($userDB, $userDB->id);
        }

        return [
            'current_page' => $currentPage,
            'next_page' => $nextPage,
            'last_page' => $lastPage,
            'per_page' => $perPage,
            'total' => $total,
            'data' => $users,
        ];
    }

    public function delete(User $user): int
    {
        $result = DB::delete('DELETE FROM `users` WHERE id=:id', [
            "id" => $user->id,
        ]);
    
        return $result;
    }
    
}
