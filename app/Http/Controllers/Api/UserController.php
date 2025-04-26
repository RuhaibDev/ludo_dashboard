<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function __construct(public UserRepository $userRepository){}

    /**
     * @throws \Throwable
     */
    public function create(StoreUserRequest $request): JsonResource
    {
        $filteredResponse = $request->validated();
        $response = $this->userRepository->createUser($filteredResponse);
        return new UserResource($response);
    }
}
