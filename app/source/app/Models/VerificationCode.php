<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{

    protected $fillable = ['user_id', 'code', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
