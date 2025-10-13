<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/products/create', [ProductController::class, 'index'])->name('products.create');

Route::get('/products/store', [ProductController::class, 'index'])->name('products.store');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');