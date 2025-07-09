<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $produits = DB::select('SELECT * FROM products');
        return view('product', ['produits' => $produits]);
    }
}
