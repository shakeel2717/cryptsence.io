<?php

namespace App\Models\user;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'referral_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
