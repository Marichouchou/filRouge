<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeBiens extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'adminAgence',
    ];


    public function agences(){
        return $this->BelongsTo(Agences::class, 'adminAgence');
    }

}
