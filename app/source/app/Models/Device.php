<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['user_id', 'device_id', 'user-agent', 'ip','ip_behind_proxy', 'last_login_at', 'last_logout_at','location', 'status'];
    protected $dates = ['last_login_at', 'last_logout_at'];
}
