<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const TABLE = 'users';

    const PROP_ID = 'id';
    const PROP_NAME = 'name';
    const PROP_EMAIL = 'email';
    const PROP_EMAIL_VERIFIED_AT = 'email_verified_at';
    const PROP_PASSWORD = 'password';
    const PROP_CREATED_AT = 'created_at';
    const PROP_UPDATE_AT = 'updated_at';
    const PROP_REMEMBER_TOKEN = 'remember_token';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
