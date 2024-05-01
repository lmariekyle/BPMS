<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Resident;
use App\Models\Sitio;
use App\Notifications\NewResetPasswordNotification;
use Hydrat\Laravel2FA\TwoFactorAuthenticatable;
use Hydrat\Laravel2FA\Contracts\TwoFactorAuthenticatableContract;

class User extends Authenticatable implements MustVerifyEmail, TwoFactorAuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, TwoFactorAuthenticatable;

    public function sendPasswordResetNotification($token){
        $this->notify(new NewResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'residentID',
        'idNumber',
        'profileImage',
        'userlevel',
        'contactNumber',
        'barangay',
        'sitioID',
        'email',
        'password',
        'assignedSitioID',
        'revisedBy',
        // 'code',
        // 'otp_expired_at',
    ];

    // public $incrementing = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'residentID');
    }

    public function transactionuser()
    {
        return $this->hasOne(Transaction::class, 'userID');
    }
    // public function sitio(){
    //     return $this->belongsTo(Sitio::class);
    // }

    // public function generateCode(){
    //     $this->timestamps = false;
    //     $this->code = rand(1000,9999);
    //     $this->otp_expired_at = now()->addMinute(10);
    //     $this->save();
    // }
}
