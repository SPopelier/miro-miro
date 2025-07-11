<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Panier;

class CartController extends Controller
{
    /**
     * Ajouter un produit au panier de l'utilisateur connecté.
     */
    public function ajouter($productId)
    {
        $user = Auth::user();

        // Vérifie que l'utilisateur est connecté
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un produit au panier.');
        }

        // Récupère ou crée le panier de l'utilisateur
        $panier = $user->panier;

        if (!$panier) {
            $panier = new Panier();
            $panier->user_id = $user->id;
            $panier->save();
        }

        // Vérifie que le produit existe
        $product = Product::findOrFail($productId);

        // Vérifie que le produit n’est pas déjà dans le panier
        if (!$panier->products->contains($product->id)) {
            $panier->products()->attach($product->id);
        }

        return redirect()->route('cart')->with('success', 'Produit ajouté au panier avec succès.');
    }

    public function retirer($productId)
{
    $panier = Auth::user()->panier;
    if ($panier) {
        $panier->products()->detach($productId);
    }

    return redirect()->route('cart')->with('success', 'Produit retiré du panier.');
}

}
