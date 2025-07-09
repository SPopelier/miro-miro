<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSheetController;


// Accueil
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Explorer
Route::get('/product', [ProductController::class, 'index'])->name('product');

// Personnaliser
Route::get('/personnaliser', function () {
    return view('productsheet');
})->name('productsheet');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


