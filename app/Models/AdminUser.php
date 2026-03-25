<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_admin';

    protected $fillable = [
        'email_admin',
        'password_admin',
        'role',
    ];

    protected $hidden = [
        'password_admin',
        'remember_token',
    ];

    public function getAuthPassword(): string
    {
        return $this->password_admin;
    }
}
