<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendTraining extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id','date','time','qrcode'
    ];
}
