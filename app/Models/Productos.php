<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    public function depositos(){
        return $this->belongsToMany(Depositos::class, 'inventarios', 'productos_id', 'depositos_id')->withTimestamps();
    }

    public function ventas(){
        return $this->belongsToMany(Ventas::class);
    }

    public function compras(){
        return $this->belongsToMany(Compras::class);
    }

    public function inventarios(){
        return $this->hasMany(Inventarios::class);
    }

    public function transferencias(){
        return $this->belongsToMany(Transferencias::class);
    }

    public function valorMedio(){
        return $this->inventarios->sum('cantidad') * $this->costo_promedio;
    }

    public function valorReal(){
        return $this->inventarios->sum('cantidad') * $this->costo_unitario;
    }

    public function margen(){
        if($this->valorMedio() == 0){
            return 0;
        }else{
            return ((($this->valorReal()) / ($this->valorMedio())) - 1) * 100;
        }
    }
}
