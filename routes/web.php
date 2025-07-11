<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSheetController;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\AccountController;

// 🔵 Accueil public
Route::get('/', fn() => view('homepage'))->name('homepage');

// 🔵 Produits
Route::get('/product', fn() => view('product', ['produits' => Product::all()]))->name('product');
Route::get('/product/nom', [ProductController::class, 'sortedByName'])->name('product.nom');
Route::get('/product/prix', [ProductController::class, 'sortedByPrice'])->name('product.prix');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product/filtrer', [ProductController::class, 'filtrer'])->name('product.filtrer');

// 🧾 Fiche produit individuelle via ProductsheetController
Route::get('/product/fiche/{id}', [ProductSheetController::class, 'show'])->name('productsheet.show');

// 🔵 Autres pages
Route::get('/contact', fn() => view('contact'))->name('contact');

// 🔐 Compte utilisateur (standard)
Route::get('/mon-compte', [AccountController::class, 'show'])->name('mon-compte');
Route::post('/connexion', [AccountController::class, 'login'])->name('connexion');
Route::post('/inscription', [AccountController::class, 'register'])->name('inscription');

// 🔒 Dashboard utilisateur (non admin)
Route::get('/dashboard', [AccountController::class, 'dashboard'])
    ->middleware('auth') // utilisateur standard
    ->name('dashboard');

// 🚪 Déconnexion utilisateur
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// 🛒 Affichage du panier utilisateur
Route::get('/mon-panier', function () {
    return view('cart');
})->middleware('auth')->name('cart');

// ➕ Ajouter un produit au panier
Route::post('/panier/ajouter/{id}', [\App\Http\Controllers\CartController::class, 'ajouter'])->name('panier.ajouter');


// 🛡️ Admin - Tableau de bord
Route::get('/admin/dashboard', [AccountController::class, 'adminDashboard'])
    ->name('admin.dashboard');

// 🚪 Déconnexion admin
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('admin.logout');

// 🧰 Backoffice (réservé aux utilisateurs authentifiés)
Route::middleware(['auth'])->prefix('backoffice')->name('backoffice.')->group(function () {
    Route::get('/dashboard', [BackofficeController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [BackofficeController::class, 'index'])->name('index');
    Route::get('/create', [BackofficeController::class, 'create'])->name('create');
    Route::post('/store', [BackofficeController::class, 'store'])->name('store');
    Route::get('/produits/{id}/edit', [BackofficeController::class, 'edit'])->name('edit');
    Route::put('/produits/{id}', [BackofficeController::class, 'update'])->name('update');
    Route::delete('/produits/{id}', [BackofficeController::class, 'destroy'])->name('destroy');
});
