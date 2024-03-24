<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'quarter',
        'totalHouseholdsSitio',
        'totalResidentsSitio',
        'totalHouseholdsBarangay',
        'totalResidentsBarangay',
        'revisedBy',
    ];
}
