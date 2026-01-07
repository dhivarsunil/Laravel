<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::post('createUser',[UserController::class,'creatUser']);
    Route::put('update/{id}',[UserController::class,'updateUser']);
    Route::get('show/{id}',[UserController::class,'showUserById']);
    Route::get('/',[UserController::class,'showAllUser']);
});
