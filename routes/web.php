<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/destroy/{user}', [UserWebController::class, 'destroyUser']);
Route::get('/user/{user}', [UserWebController::class, 'getUser']);
Route::get('/users',[UserWebController::class, 'getAllUsers']);
Route::post('/createUser', [UserWebController::class, 'createUser'])->name('signup');
Route::post('/updateUser/{user}', [UserWebController::class, 'updateUser'])->name('update');
