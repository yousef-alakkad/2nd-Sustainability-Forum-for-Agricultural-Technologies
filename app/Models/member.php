<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\WorkShop;

class member extends Model
{
    use HasFactory;

    protected $guarded=[];
     protected $casts = [
        'technologies' => 'array', 
    ];

}
