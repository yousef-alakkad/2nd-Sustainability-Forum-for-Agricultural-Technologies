<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile',
        'category',
        'satisfaction',
        'content_satisfaction',
        'note',
    ];
}
