<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    public function permisos(){
        return $this->belongsToMany(Permisos::class)->withTimestamps()->withPivot(['salt']);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'perfiles_users', 'perfiles_id', 'users_id')->withTimestamps();
    }
}
