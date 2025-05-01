<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/createUser', [UserController::class, 'createUser']);
Route::get('/destroy/{id}', [UserController::class, 'destroyUser']);
Route::get('user/{id}', [UserController::class, 'getUser']);
Route::get('users', [UserController::class, 'getUsers']);

