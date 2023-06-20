<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'dateOfBirth',
        'contactNumber',
        'barangay',
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

    public function user()
    {
        return $this->hasOne(User::class,'residentID');
    }

}