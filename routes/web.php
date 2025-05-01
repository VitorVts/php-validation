<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/destroy/{id}', [UserController::class, 'destroyUser']);
Route::get('user/{id}', [UserController::class, 'getUser']);
Route::get('users', [UserController::class, 'getUsers']);

Route::post('/createUser', [UserController::class, 'createUser']);
