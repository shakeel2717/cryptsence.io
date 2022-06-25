<?php

namespace App\Models\admin;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'title',
        'price',
        'profit',
        'duration',
        'status',
        'stock',
        'nft',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
