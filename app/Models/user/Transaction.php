<?php

namespace App\Models\user;

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
        'currency',
        'txn_id',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
