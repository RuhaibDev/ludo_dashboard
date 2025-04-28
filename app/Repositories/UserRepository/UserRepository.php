<?php

namespace App\Repositories\UserRepository;

use App\Models\User;

class UserRepository implements  UserRepositoryInterface
{
    public function createUser(array $data)
    {
        return User::query()->create($data);
    }

    public function userLogin(string $email)
    {
        return User::query()->where('email', $email)->firstOrFail();
    }
}
