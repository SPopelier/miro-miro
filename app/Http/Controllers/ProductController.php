<?php

namespace App\Http\Controllers;

class ProductController extends Controller {
    public function index()  {
        return view ('product');
    }

    public function show($id)
    {
        return "Fiche du produit $id";
    }
}