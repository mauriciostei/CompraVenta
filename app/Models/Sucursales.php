<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;

    public function depositos(){
        return $this->hasMany(Depositos::class);
    }

    public function cajas(){
        return $this->hasMany(Cajas::class);
    }
}
