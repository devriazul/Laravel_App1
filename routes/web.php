<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/products', [ProductController::class, 'index'])->name('admin.product');

Route::get('/products/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/products/create', [ProductController::class, 'store']);

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/product/edit/{id}', [ProductController::class, 'update']);

Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');

Route::get('user', [UserController::class, 'index'])->name('admin.user');

Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
Route::post('user/create', [UserController::class, 'store']);
