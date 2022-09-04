<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biens extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_biens',
        'adresse',
        'etat_biens',
        'images_biens',
        'proprioId',
        'typeId',
    ];


    public function proprietaires(){
        return $this->BelongsTo(Proprietaires::class, 'proprioId');
    }

    public function type_biens(){
        return $this->BelongsTo(TypeBiens::class, 'typeId');
    }
}
