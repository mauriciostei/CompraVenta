<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depositos extends Model
{
    use HasFactory;

    public function productos(){
        return $this->belongsToMany(Productos::class, 'inventarios', 'depositos_id', 'productos_id');
    }

    public function sucursales(){
        return $this->belongsTo(Sucursales::class);
    }

    public function inventarios(){
        return $this->hasMany(Inventarios::class);
    }

    public function transferencias_cab(){
        return $this->hasMany(Transferencias::class);
    }

    public function transferencias_det(){
        return $this->belongsToMany(Transferencias::class);
    }
}
