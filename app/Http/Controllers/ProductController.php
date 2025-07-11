<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //Récupère tous les produits triés par nom 
    public function sortedByName()
    {
        $produits = Product::orderBy('nom')->get();
        return view('products.sorted-name', compact('produits'));
    }

    //Récupère tous les produits triés par prix
    public function sortedByPrice()
    {
        $produits = Product::orderBy('prix')->get();
        return view('products.sorted-price', compact('produits'));
    }

    //Affiche un seul produit selon son identifiant
    public function show($id)
    {
        $produit = Product::findOrFail($id);
        return view('products.show', compact('produit'));
    }

    //Logique conditionnelle : si l’utilisateur choisit un tri, on le redirige vers la bonne route. Sinon, message d’erreur.
    public function filtrer(Request $request)
    {
        if ($request->tri === 'nom') {
            return redirect()->route('product.nom')->with('message', 'Tri par nom appliqué');
        } elseif ($request->tri === 'prix') {
            return redirect()->route('product.prix')->with('message', 'Tri par prix appliqué');
        }

        return redirect()->back()->with('error', 'Option de tri invalide.');
    }

    //valide les champs envoyés, trouve le produit, applique la mise à jour, et redirige
    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string',
        'prix' => 'required|numeric',
        'description' => 'nullable|string',
        'stock' => 'required|integer'
    ]);

    $produit = Product::findOrFail($id);
    $produit->update($request->only(['nom', 'prix', 'description', 'stock']));

    return redirect()->route('product.index')->with('message', 'Produit mis à jour !');
}

}
