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
        'id',
        'documentID',
        'userID',
        'paymentID',
        'detailID',
        'docNumber',
        'serviceStatus',
        'endorsedBy',
        'endorsedOn',
        'approvedBy',
        'approvedOn',
        'releasedBy',
        'releasedOn',
        'remarks',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function user()
    {
        return $this->belongsTo(User::class,'userID');
    }

    public function transactiondetail()
    {
        return $this->belongsTo(DocumentDetails::class,'id');
    }

    public function transactionpayment()
    {
        return $this->belongsTo(Payment::class, 'paymentID');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'documentID');
    }

}
