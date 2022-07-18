<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    public function ventas(){
        return $this->hasMany(Ventas::class);
    }

    public function compras(){
        return $this->hasMany(Compras::class);
    }
}
