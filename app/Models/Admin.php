<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//créer une nouvelle class Admin avec les fonctionnalités d'ath Laravel
class Admin extends Authenticatable
{
    use Notifiable;


    //Ce champ spécifie quel guard d’authentification utiliser pour ce modèle.
    protected $guard = 'admin';


    // Laravel autorisera le remplissage en masse de ces champs. Très important pour la sécurité (et la clarté !).
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    //Ces champs seront masqués automatiquement lors de la conversion du modèle en JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
