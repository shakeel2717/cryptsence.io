<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftBonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_id',
        'sum',
        'amount',
        'status',
        'nft_price',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }


}
