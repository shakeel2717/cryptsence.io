<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakingBonus extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'sum', 'amount', 'status', 'stake_amount', 'note'
    ];
}
