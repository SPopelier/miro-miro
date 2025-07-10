<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function sortedByName()
    {
        $produits = Product::orderBy('nom')->get();
        return view('products.sorted-name', compact('produits'));
    }

    public function sortedByPrice()
    {
        $produits = Product::orderBy('prix')->get();
        return view('products.sorted-price', compact('produits'));
    }

    public function show($id)
    {
        $produit = Product::findOrFail($id);
        return view('products.show', compact('produit'));
    }

    public function filtrer(Request $request)
    {
        if ($request->tri === 'nom') {
            return redirect()->route('product.nom')->with('message', 'Tri par nom appliqué');
        } elseif ($request->tri === 'prix') {
            return redirect()->route('product.prix')->with('message', 'Tri par prix appliqué');
        }

        return redirect()->back()->with('error', 'Option de tri invalide.');
    }
}
