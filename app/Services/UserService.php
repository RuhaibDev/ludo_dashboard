<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository\UserRepository;

class UserService
{
    public function __construct(public UserRepository $userRepository)
    {
    }

    public function createUser(array $data)
    {
        $user = $this->userRepository->createUser($data);
        $user->assignRole(User::USER_ROLE);
        return $user;
    }

    public function userLogin(string $email)
    {
        return $this->userRepository->userLogin($email);
    }

}
