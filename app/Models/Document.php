<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'docName',
        'docType',
        'docTemplate',
        'createdBy',
    ];
    public function transactiondoc()
    {
        return $this->hasOne(Transaction::class, 'documentID');
    }
}
