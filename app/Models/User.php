<?php

namespace App\Models;

use App\Models\user\Referral;
use App\Models\user\UserNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'country',
        'region',
        'city',
        'refer',
        'zip',
        'latitude',
        'longitude',
    ];

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


    function login_histories()
    {
        return $this->hasMany(LoginHistory::class);
    }


    function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


    function google_auths()
    {
        return $this->hasOne(GoogleAuth::class);
    }


    function referral()
    {
        return $this->hasOne(Referral::class);
    }


    function user_notifications()
    {
        return $this->hasMany(UserNotification::class);
    }


    function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }
}
