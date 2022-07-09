<?php

namespace App\Models\admin;

use App\Models\NftCategory;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'status',
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

    public function nft_category()
    {
        return $this->belongsTo(NftCategory::class);
    }


}
