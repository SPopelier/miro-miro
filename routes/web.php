<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackofficeController;


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

// Backoffice
Route::prefix('backoffice')->group(function () {
    
    // Page d'accueil du backoffice
    Route::get('/', [BackofficeController::class, 'index'])->name('backoffice.index');

    // Création d’un produit
    Route::get('/create', [BackofficeController::class, 'create'])->name('backoffice.create');
    Route::post('/store', [BackofficeController::class, 'store'])->name('backoffice.store');

    // Édition et mise à jour d’un produit
    Route::get('/produits/{id}/edit', [BackofficeController::class, 'edit'])->name('backoffice.edit');
    Route::put('/produits/{id}', [BackofficeController::class, 'update'])->name('backoffice.update');

    // Mise à jour d’un produit
    Route::put('/produits/{id}', [BackofficeController::class, 'update'])->name('backoffice.update');
});

