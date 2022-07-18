<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aperturas extends Model
{
    use HasFactory;

    public function cajas(){
        return $this->belongsTo(Cajas::class);
    }

    public function ventas(){
        return $this->hasMany(Ventas::class);
    }

    public function compras(){
        return $this->hasMany(Compras::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
