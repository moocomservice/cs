<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AppUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'app_users';

    // Add fillable fields to allow mass assignment
    protected $fillable = [
        'username', 'email', 'password', 'role'
    ];

    // Hide sensitive fields from JSON output
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Cast fields to specific types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
