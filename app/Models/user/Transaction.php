<?php

namespace App\Models\user;

use App\Models\Coin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'status',
        'sum',
        'coin_id',
        'txn_id',
        'note',
        'reference',
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
