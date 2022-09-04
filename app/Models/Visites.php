<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visites extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_visiteur',
        'prenom_visiteur',
        'date_visite',
        'heure_visite',
        'adresse_visite',
        'bienId',
    ];

    public function biens(){
        return $this->hasMany(Biens::class, 'bienId');
    }
}
