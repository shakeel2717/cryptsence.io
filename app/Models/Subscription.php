<?php

namespace App\Models;

use App\Models\admin\Nft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nft()
    {
        return $this->belongsTo(Nft::class);
    }

    public function nftBonus()
    {
        return $this->hasMany(NftBonus::class);
    }
}
