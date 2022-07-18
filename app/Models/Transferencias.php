<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencias extends Model
{
    use HasFactory;

    public function productos(){
        return $this->belongsToMany(Productos::class)->withTimestamps();
    }

    public function depositos(){
        return $this->belongsTo(Depositos::class);
    }

    public function depositos_det(){
        return $this->belongsToMany(Depositos::class);
    }
}
