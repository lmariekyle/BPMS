<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDetails extends Model
{
    use HasFactory;

    public $table = 'documentdetails';

    protected $fillable = [
        'requesteeFName',
        'requesteeMName',
        'requesteeLName',
        'requesteeEmail',
        'requesteeContactNumber',
        'requestPurpose',
        'file'
    ];

    protected $casts = [
        'requesteeFName' => 'encrypted',
        'requesteeMName' => 'encrypted',
        'requesteeLName' => 'encrypted',
        'requesteeContactNumber' => 'encrypted',
    ];

    public function transactiondetail()
    {
        return $this->hasOne(Transaction::class, 'detailID');
    }
}
