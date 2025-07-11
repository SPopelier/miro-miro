<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Panier;

class Product extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'image'];

    // Un produit appartient à un utilisateur.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un produit peut appartenir à plusieurs paniers.
    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'panier_product');
    }
}
