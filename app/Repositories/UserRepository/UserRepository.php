<?php

namespace App\Repositories\UserRepository;

use App\Models\User;

class UserRepository implements  UserRepositoryInterface
{

    public function createUser(array $data): User
    {
       $user = User::query()->create($data);
       $user->assignRole(User::USER_ROLE);
       return $user;
    }
}
