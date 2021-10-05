<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\LoginController;

Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'dologin']);

Route::get('register',[App\Http\Controllers\Frontend\UserController::class,'register'])->name('register');
Route::post('register',[App\Http\Controllers\Frontend\UserController::class,'doRegister']);

Route::get('add/cart/{id}',[\App\Http\Controllers\Frontend\CartController::class,'cart'])->name('add.cart');
Route::get('cart',[\App\Http\Controllers\Frontend\CartController::class,'show'])->name('cart');

Route::middleware('auth')->group(function (){
    Route::get('checkout',[\App\Http\Controllers\Frontend\CartController::class,'checkout'])->name('checkout');
    Route::post('order',[\App\Http\Controllers\Frontend\CartController::class,'order'])->name('order');

    Route::get('userProfile',[App\Http\Controllers\Frontend\UserController::class,'userProfile'])->name('userProfile');
    Route::post('userProfile',[App\Http\Controllers\Frontend\UserController::class,'editProfile']);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('dashboard')->group(function (){
        Route::middleware('isAdmin')->group(function (){

            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

            Route::get('/profile', [LoginController::class, 'profile'])->name('profile');

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

            //order

            Route::get('orders',[\App\Http\Controllers\Backend\OrderController::class,'index'])->name('admin.order');
            Route::get('orders/{id}',[\App\Http\Controllers\Backend\OrderController::class,'show'])->name('admin.order.show');
            Route::post('orders/{id}',[\App\Http\Controllers\Backend\OrderController::class,'update']);

        });
    });
});
