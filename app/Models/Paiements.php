<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    use HasFactory;
    protected $fillable = [
        'motif_paiement',
        'date_paiement',
        'heure_paiement',
        'montant_paye',
        'montant_restant',
        'lcationId',
    ];

    public function locations(){
        return $this->hasMany(Locations::class, 'locationId');
    }
}
