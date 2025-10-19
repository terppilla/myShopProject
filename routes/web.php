<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('products', ProductController::class);

Route::get('/products/{id}/json', [ProductController::class, 'getProduct'])->name('products.get');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');