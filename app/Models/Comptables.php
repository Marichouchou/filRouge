<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comptables extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'email',
        'password',
        'adminUser',
        'adminAgence',
    ];

    public function users(){
        return $this->BelongsTo(User::class, 'adminUser');
    }

    public function agences(){
        return $this->BelongsTo(Agences::class, 'adminAgence');
    }

}
