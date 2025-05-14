<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MikrotikRouter extends Model
{
    protected $fillable = [
        'name',
        'ip_address',
        'api_port',
        'username',
        'password',
        'is_actice'
    ];

    protected $hidden = [
        'password'
    ];
}
