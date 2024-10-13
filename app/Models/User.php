<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Ubah ini untuk menurunkan dari Authenticatable
use Illuminate\Notifications\Notifiable; // Ini adalah import yang benar untuk Notifiable

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
