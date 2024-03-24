<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Households extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sitioID',
        'houseNumber',
        'street',
        'buildingName',
        'unitNumber',
        'floorNumber',
        'residenceType',
        'nHTS',
        'householdToiletFacilities',
        'IP',
        'accessToWaterSupply',
        'remarksOfWaterSupply',
        'yearOfVisit',
        'quarterNumber',
        'dateOfVist',
        'respondentName',
        'createdBy',
        'revisedBy',
    ];
}
