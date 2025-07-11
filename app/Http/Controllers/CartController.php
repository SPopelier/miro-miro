<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function ajouter($id)
    {
        $produit = Product::findOrFail($id);
        $user = Auth::user();

        // Si l'utilisateur n'a pas encore de panier, on le crée
if (!$user->panier) {
    $panier = new \App\Models\Panier();
    $panier->user_id = $user->id;
    $panier->save();
}

        // Associe le produit au panier de l'utilisateur
        $produit->panier_id = $user->panier->id;
        $produit->save();

        return redirect()->route('cart')->with('success', 'Produit ajouté au panier !');
    }


}
