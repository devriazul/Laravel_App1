<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\LoginController;

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'dologin']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('profile', [LoginController::class, 'profile'])->name('profile');

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/products', [ProductController::class, 'index'])->name('admin.product');

Route::get('/products/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/products/create', [ProductController::class, 'store']);

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/product/edit/{id}', [ProductController::class, 'update']);

Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');

Route::get('user', [UserController::class, 'index'])->name('admin.user');

Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('user/create', [UserController::class, 'store']);

Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
Route::post('user/edit/{id}', [UserController::class, 'update']);

Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
