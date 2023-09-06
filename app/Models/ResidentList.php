<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentList extends Model
{
    protected $fillable = [
        'residentID',
    ];

    use HasFactory;
    protected $fillable =[
        'residentID',
        'houseID',

        'householdHead',
        'memberNumber',

        'createdBy',
        'revisedBy'
    ];
}
