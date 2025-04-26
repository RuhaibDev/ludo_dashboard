<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Player extends Model
{
    protected $fillable = ['name','email','type','uuid'];

    // Automatically generate a UUID when creating
    public static function boot()
    {
        parent::boot();

        static::creating(function($player){
            $player->uuid = (string) Str::uuid();
        });
    }
}
