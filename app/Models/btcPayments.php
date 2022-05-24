<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class btcPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'address',
        'txn_id',
        'to_currency',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
