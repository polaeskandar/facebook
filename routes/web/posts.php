<?php

use App\Http\Controllers\Posts\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('/posts')->group(function () {
  Route::get('/load', [PostController::class, 'getPosts'])->name('posts.get');
  Route::post('/create', [PostController::class, 'createPost'])->name('posts.create');
  Route::post('/image/upload', [PostController::class, 'uploadPostImage'])->name('posts.image.upload');
  Route::get('/check-like', [PostController::class, 'checkLike'])->name('posts.likes.check-like');
  Route::post('/like-unlike', [PostController::class, 'likeUnlike'])->name('posts.likes.toggle');
});
