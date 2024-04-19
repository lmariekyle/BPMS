<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paymentMethod',
        'orNumber',
        'paymentStatus',
        'referenceNumber',
        'receivedBy',
        'paymentDate',
        'screenshot',
        'remarks',
    ];

    public function transactionpayment()
    {
        return $this->hasOne(Transaction::class, 'paymentID');
    }
}
