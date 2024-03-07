<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'residentID',
        'firstName',
        'middleName',
        'lastName',
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

    protected $hidden = [
        'firstName',
        'middleName',
        'lastName',
    ];

    protected $casts = [
        'firstName' => 'encrypted',
        'middleName' => 'encrypted',
        'lastName' => 'encrypted',
    ];

    public function getFirstNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Accessor for middleName attribute
    public function getMiddleNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Accessor for lastName attribute
    public function getLastNameAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Accessor for dateOfBirth attribute
    public function getDateOfBirthAttribute($value)
    {
        // You can add any custom logic here if needed
        return $value;
    }

    //public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class, 'residentID');
    }
}
