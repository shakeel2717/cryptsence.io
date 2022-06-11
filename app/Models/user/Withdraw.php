<?php

namespace App\Models\user;

use App\Models\Coin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coin_id',
        'amount',
        'address',
        'status',
        'txid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}
