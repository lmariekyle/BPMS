<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
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

}
