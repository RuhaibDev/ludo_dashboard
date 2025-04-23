<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Which attributes can be mass‑assigned
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Hide these when serializing
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
