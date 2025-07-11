<?php

namespace App\Http\Controllers;
use App\Models\Product;


//cherche les produits dont l'id = valeur et envoie le résultat à la vue productsheet
class ProductSheetController extends Controller {
    public function show($id)
    {
        $produit = Product::where("id", "=" ,$id)->get();
        return view('productsheet', ['produit' => $produit ]);
    }
}