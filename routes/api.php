<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\UserController;


Route::post('/user/create',[UserController::class, 'create']);
