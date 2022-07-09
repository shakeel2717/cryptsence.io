<?php

namespace App\Models;

use App\Models\admin\Nft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NftCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'duration',
        'profit',
        'stock',
        'note',
        'status',
        'picture',
    ];


    public function nfts()
    {
        return $this->hasMany(Nft::class);
    }
}
