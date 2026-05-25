<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = ['ip_address', 'session_id', 'page', 'last_seen_at'];

    protected $casts = [
        'last_seen_at' => 'datetime',
    ];
}
