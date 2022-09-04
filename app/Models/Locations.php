<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_location',
        'bienId',
        'clientId',
        'adminAgence',
    ];

    public function biens(){
        return $this->hasMany(Biens::class, 'bienId');
    }
    public function agences(){
        return $this->BelongsTo(Agences::class, 'adminAgence');
    }

    public function clients(){
        return $this->BelongsTo(Clients::class, 'clientId');
    }
}
