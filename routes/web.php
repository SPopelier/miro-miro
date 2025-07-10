<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

// Accueil
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Explorer (affiche tous les produits sans tri)
Route::get('/product', function () {
    $produits = Product::all();
    return view('product', compact('produits'));
})->name('product');

// Tri des produits
Route::get('/product/nom', [ProductController::class, 'sortedByName'])->name('product.nom');
Route::get('/product/prix', [ProductController::class, 'sortedByPrice'])->name('product.prix');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Filtrage depuis formulaire
Route::post('/product/filtrer', [ProductController::class, 'filtrer'])->name('product.filtrer');

// Personnaliser
Route::get('/personnaliser', function () {
    return view('productsheet');
})->name('productsheet');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
