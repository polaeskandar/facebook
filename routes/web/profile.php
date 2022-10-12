<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/profile')->group(function () {
  Route::view('/', 'profile.profile')->name('profile.index');
  Route::get('/image/get', [UserController::class, 'getProfileImage'])->name('profile.image.get');
  Route::post('/image/upload', [UserController::class, 'uploadProfileImage'])->name('profile.image.upload');
});

