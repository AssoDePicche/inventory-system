<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('register');
});

Route::middleware(['auth']->group(function () {
    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::resource('transactions', TransactionController::class);

    Route::resource('users', UserController::class);
}));
