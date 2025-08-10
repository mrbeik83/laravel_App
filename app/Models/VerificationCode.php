<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $table = 'verification_code';
    protected $fillable = [
        'phone',
        'code',
        'used',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used' => 'boolean'
    ];
}
