<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agences extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_complet',
        'nom_agence',
        'adresse_agence',
        'telephone_agence',
        'registre_agence',
        'description_agence',
        'logo_agence',
        'site_web',
        'email',
        'password',
        'userId',
    ];

    public function users(){
        return $this->BelongsTo(User::class, 'userId');
    }
    public function proprietaires(){
        return $this->hasMany(Proprietaires::class, 'adminAgence');
    }

    public function clients(){
        return $this->hasMany(Clients::class, 'adminAgence');
    }
}
