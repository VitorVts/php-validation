<?php
use App\Http\Controllers\UserApiController;
use Illuminate\Support\Facades\Route;


Route::post('/createUser', [UserApiController::class, 'createUser']);
Route::get('/destroy/{id}', [UserApiController::class, 'destroyUser']);
Route::get('/user/{id}', [UserApiController::class, 'getUser']);
Route::get('/users', [UserApiController::class, 'getUsers']);
Route::post('/createUser', [UserApiController::class, 'createUser']);
Route::post('/updateUser', [UserApiController::class, 'createUser']);

