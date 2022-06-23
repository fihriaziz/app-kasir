<?php

use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/getProductByName', [ProductController::class, 'getProductByName']);
Route::get('/getProducts', [ProductController::class, 'getProducts']);
Route::post('/createNota', [NotaController::class, 'store']);
Route::get('/getNota/{id}', [NotaController::class, 'show']);
Route::get('/printNota/{id}', [NotaController::class, 'print']);
