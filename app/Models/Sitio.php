<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Sitio extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'sitioID');
    }
}
