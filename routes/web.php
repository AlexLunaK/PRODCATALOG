<?php

use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductosController::class,'index'])->name('productos.index');
Route::get('/create',[ProductosController::class,'create'])->name('productos.create');
Route::post('/store',[ProductosController::class,'store'])->name('productos.store');
Route::get('/edit/{id}',[ProductosController::class,'edit'])->name('productos.edit');
Route::put('/update/{id}',[ProductosController::class,'update'])->name('productos.update');
Route::get('/show',[ProductosController::class,'show'])->name('productos.show');