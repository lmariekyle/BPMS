<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documentID',
        'userID',
        'paymentID',
        'detailID',
        'serviceAmount',
        'docNumber',
        'serviceStatus',
        'issuedDocument',
        'remarks',
        'issuedBy',
        'issuedOn',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
