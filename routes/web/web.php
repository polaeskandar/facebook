<?php

use App\Http\Controllers\Pages\IndexPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexPageController::class, 'index'])->name('index');

