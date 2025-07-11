<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Panier extends Model
{

    //Un panier appartient à un utilisateur.
    public function user()
{
    return $this->belongsTo(User::class);
}


public function products()
{
    return $this->belongsToMany(Product::class, 'panier_product');
}
}
