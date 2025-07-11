<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class BackofficeController extends Controller
{
    /**
     * Affiche le tableau de bord uniquement si l'utilisateur est admin.
     */
    public function dashboard()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
    abort(403, 'Accès non autorisé.');
}

        return view('backoffice.dashboard', [
            'nombreProduits' => Product::count(),
            'produitsStock'  => Product::where('stock', '>', 0)->count(),
            'dernierProduit' => Product::latest()->first()
        ]);
    }

    /**
     * Affiche la liste complète des produits.
     */
    public function index()
    {
        $produits = Product::all();
        return view('backoffice.index', compact('produits'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     */
    public function create()
    {
        return view('backoffice.create');
    }

    /**
     * Enregistre un nouveau produit.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'prix'        => 'required|numeric|min:0',
            'image'       => 'required|string|max:255',
        ]);

        Product::create($request->all());

        return redirect()->route('backoffice.index')
                         ->with('message', 'Produit ajouté avec succès !');
    }

    /**
     * Affiche le formulaire d’édition d’un produit.
     */
    public function edit($id)
    {
        $produit = Product::findOrFail($id);
        return view('backoffice.edit', compact('produit'));
    }

    /**
     * Met à jour les informations d’un produit.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'prix'        => 'required|numeric|min:0',
            'image'       => 'required|string|max:255',
        ]);

        $produit = Product::findOrFail($id);
        $produit->update($request->all());

        return redirect()->route('backoffice.index')
                         ->with('message', 'Produit mis à jour !');
    }

    /**
     * Supprime un produit.
     */
    public function destroy($id)
    {
        $produit = Product::findOrFail($id);
        $produit->delete();

        return redirect()->route('backoffice.index')
                         ->with('message', 'Produit supprimé');
    }
}
