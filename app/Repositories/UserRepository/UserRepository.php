<?php

namespace App\Repositories\UserRepository;

use App\Models\User;

class UserRepository implements  UserRepositoryInterface
{
    public function createUser(array $data)
    {
        return User::query()->create($data);
    }
}
