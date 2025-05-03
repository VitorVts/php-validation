<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserWebController;

Route::get('/signup', function () {
    return view('signup');
});



Route::get('/destroy/{user}', [UserWebController::class, 'destroyUser'])->name('destroyUser');
Route::get('/user/{user}', [UserWebController::class, 'getUser']);
Route::get('/users',[UserWebController::class, 'getAllUsers'])->name('user.users');
Route::get('/signup', [UserWebController::class, 'signup'])->name('user.signup');
Route::post('/user/createUser', [UserWebController::class, 'createUser'])->name('user.createUser');
Route::get('/user/{user}/edit', [UserWebController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserWebController::class, 'update'])->name('update');
Route::post('/search', [UserWebController::class, 'search'])->name('search');
