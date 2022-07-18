<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    use HasFactory;

    public function timbrados(){
        return $this->belongsTo(Timbrados::class);
    }

    public function aperturas(){
        return $this->hasMany(Aperturas::class);
    }

    public function sucursales(){
        return $this->belongsTo(Sucursales::class);
    }
}
