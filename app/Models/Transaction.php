<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function transactiondetail()
    {
        return $this->belongsTo(DocumentDetails::class);
    }

    public function transactionpayment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function transactionuser()
    {
        return $this->belongsTo(User::class);
    }
}
