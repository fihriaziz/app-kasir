<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\NotaDetailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'v_login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'v_register');
    Route::post('/register', 'register')->name('register');
});

Route::middleware(['auth'])->group(function(){
    Route::controller(ProductController::class)->group(function(){

        Route::get('/products', 'index')->name('products');
        Route::get('/product/create', 'create')->name('create-product');
        Route::post('/product/create', 'store')->name('store-product');
        Route::get('/product/edit/{id}', 'edit')->name('edit');
        Route::put('/product/edit/{id}', 'update')->name('update-product');
        Route::delete('/product/delete/{id}', 'destroy')->name('delete');
    });

    Route::get('/nota-detail', [NotaController::class, 'index'])->name('nota-detail');
    Route::get('/nota', [NotaController::class, 'create'])->name('create-nota');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/forgot-password', [AuthController::class, 'v_forgot']);
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
});
