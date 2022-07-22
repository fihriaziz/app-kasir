<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\NotaDetailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'v_login')->middleware('guest');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'v_register')->middleware('guest');
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

    Route::controller(NotaController::class)->group(function(){
        Route::get('/nota-detail','index')->name('nota-detail');
        Route::get('/nota','create')->name('create-nota');
        Route::get('/print/{id}','print')->name('print');
        Route::delete('/nota/delete/{id}', 'destroy')->name('destroy');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/forgot-password', [AuthController::class, 'v_forgot']);
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/nota/print', [NotaDetailController::class, 'cetakPdf']);
});
