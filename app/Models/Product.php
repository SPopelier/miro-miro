<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'image'];

    //un produit appartient à un utilisateur
    public function user()
{
    return $this->belongsTo(User::class);
}

public function panier()
{
    return $this->belongsTo(Panier::class);
}

}
