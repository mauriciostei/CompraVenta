<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarios extends Model
{
    use HasFactory;

    public function productos(){
        return $this->belongsTo(Productos::class);
    }

    public function depositos(){
        return $this->belongsTo(Depositos::class);
    }
}
