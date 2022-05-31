<?php

namespace App\Models;

use App\Models\user\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
