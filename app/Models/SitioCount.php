<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitioCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'sitioID',
        'statID',
        'genderGroup',
        'ageGroup',
        'residentCount',
    ];
}
