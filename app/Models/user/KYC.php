<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'country',
        'document',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
