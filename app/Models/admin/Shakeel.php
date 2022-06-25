<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shakeel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'amount',
    ];
}
