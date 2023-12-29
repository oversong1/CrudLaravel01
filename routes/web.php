<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController::class, 'edit']);
Route::put('products/{id}/update', [ProductController::class, 'update']);

//Versão 01 com a ou link para deletar Funcional
// Route::get('products/{id}/delete', [ProductController::class, 'destroy']);

//Versão 02 Com FORM e Button para deletar 
Route::delete('products/{id}/delete', [ProductController::class, 'destroy']);
