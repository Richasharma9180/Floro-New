<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthenticationLog extends Model
{

    protected $fillable = [
        'user_id', 'login_time', 'logout_time', 'agent', 'ip_address'
    ];


}
