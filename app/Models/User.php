<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;
    const ADMIN_ROLE = 'admin';
    const USER_ROLE = 'user';

    // Which attributes can be mass‑assigned
    protected $fillable = [
        'name',
        'email',
        'password',
        'signup_type'
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
