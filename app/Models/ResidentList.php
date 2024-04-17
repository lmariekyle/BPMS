<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentList extends Model
{

    use HasFactory;
    protected $fillable =[
        'residentID',
        'houseID',

        'houseNumber',
        'memberNumber',

        'createdBy',
        'revisedBy'
    ];
}
