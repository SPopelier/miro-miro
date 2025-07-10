<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class BackofficeController extends Controller
{
    public function dashboard()
    {
        return view('backoffice.dashboard', [
            'nombreProduits' => Product::count(),
            'produitsStock' => Product::where('stock', '>', 0)->count(),
            'dernierProduit' => Product::latest()->first()
        ]);
    }

    public function index()
    {
        $produits = Product::all();
        return view('backoffice.index', compact('produits'));
    }

    public function create()
    {
        return view('backoffice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'prix' => 'required|numeric|min:0',
            'image' => 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->route('backoffice.index')->with('message', 'Produit ajouté avec succès !');
    }

    public function edit($id)
    {
        $produit = Product::findOrFail($id);
        return view('backoffice.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'prix' => 'required|numeric|min:0',
            'image' => 'required|string|max:255',
        ]);

        $produit = Product::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('backoffice.index')->with('message', 'Produit mis à jour !');
    }

    public function destroy($id)
{
    $produit = Product::findOrFail($id);
    $produit->delete();

    return redirect()->route('backoffice.index')->with('message', 'Produit supprimé');
}

}
