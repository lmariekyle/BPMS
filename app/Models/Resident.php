<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'residentID',
        'firstname',
        'middlename',
        'lastname',
        'dateOfBirth',
        'contactNumber',
        'email',
        'maritalStatus',
        'gender',
        'philHealthNumber',
        'occupation',
        'monthlyIncome',
        'ageClassification',
        'pregnancyClassification',
        'registeredSeniorCitizen',
        'registeredPWD',
        'dateOfDeath',
        'supportingDocument',

    ];

    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class,'residentID');
    }

}
