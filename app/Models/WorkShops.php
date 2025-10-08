<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShops extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'region',
        'english_level',
        'educational_background',
        'educational_level',
        'job_title',
        'organization',
        'qrcode',
        'code',
    ];
}
