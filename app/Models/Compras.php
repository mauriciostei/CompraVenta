<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;

    public function personas(){
        return $this->belongsTo(Personas::class);
    }

    public function aperturas(){
        return $this->belongsTo(Aperturas::class);
    }

    public function productos(){
        return $this->belongsToMany(Productos::class, 'compras_productos', 'compras_id', 'productos_id')->withPivot(['depositos_id', 'cantidad', 'precio'])->withTimestamps();
    }

    public function subTotal(){
        $total = 0;
        foreach($this->productos as $prd){
            $total += $prd->pivot->cantidad * $prd->pivot->precio;
        }
        return $total;
    }
}
