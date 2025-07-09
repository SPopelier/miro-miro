<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSheetController;


Route::get(uri: '/', action: [HomeController::class, 'index']);
Route::get(uri:'/cart', action: [CartController::class, 'index']);
Route::get(uri:'/product/{id}', action: [ProductController::class, 'index']);
Route::get(uri:'/productsheet', action: [ProductSheetController::class, 'index']);


// Accueil
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Explorer
Route::get('/explorer', function () {
    return view('product');
})->name('product');

// Personnaliser
Route::get('/personnaliser', function () {
    return view('productsheet');
})->name('productsheet');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');


