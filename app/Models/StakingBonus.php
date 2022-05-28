<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StakingBonus extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'sum', 'amount', 'stake_amount', 'note'
    ];
}
