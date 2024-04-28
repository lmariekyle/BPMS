<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactionID',
        'complaintFName',
        'complaintMName',
        'complaintLName',
        'complaintEmail',
        'complaintContactNumber',
        'complaineeFName',
        'complaineeMName',
        'complaineeLName',
        'complaineeSitio',
        'requestPurpose',
    ];

    protected $casts = [
        'complaintFName' => 'encrypted',
        'complaintMName' => 'encrypted',
        'complaintLName' => 'encrypted',
        'complaintContactNumber' => 'encrypted',
        
        'complaineeFName' => 'encrypted',
        'complaineeMName' => 'encrypted',
        'complaineeLName' => 'encrypted',
    ];
}
