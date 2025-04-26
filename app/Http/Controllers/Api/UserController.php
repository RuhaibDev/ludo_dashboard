<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(public UserRepository $userRepository) {}
    public function create(StoreUserRequest $request): JsonResponse
    {
        $filteredResponse = $request->validated();
        $response = $this->userRepository->createUser($filteredResponse);
        return success($response);
    }
}
