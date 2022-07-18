<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    public function personas(){
        return $this->belongsTo(Personas::class);
    }

    public function aperturas(){
        return $this->belongsTo(Aperturas::class);
    }

    public function productos(){
        return $this->belongsToMany(Productos::class)->withPivot(['depositos_id', 'cantidad', 'precio', 'ivas_id'])->withTimestamps();
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function subTotal(){
        $total = 0;
        foreach($this->productos as $prd){
            $total += $prd->pivot->cantidad * $prd->pivot->precio;
        }
        return $total;
    }

    public function totalIVA($base){
        $total = 0;
        foreach($this->productos as $prd){
            if($prd->pivot->ivas_id == $base){
                $total += $prd->pivot->cantidad * $prd->pivot->precio;
            }
        }
        return $total;
    }

    public function totalIVAValor($base){
        $total = 0;
        $iva = Ivas::find($base);
        foreach($this->productos as $prd){
            if($prd->pivot->ivas_id == $base){
                $total += ($prd->pivot->cantidad * $prd->pivot->precio) * $iva->multiplo;
            }
        }
        return $total;
    }
}
