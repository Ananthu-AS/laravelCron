<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cron extends Model
{
    protected $fillable = [
        'Email',
        'status',
        // Add more fields as necessary
    ];
}

