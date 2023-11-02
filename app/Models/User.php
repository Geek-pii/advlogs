<?php

namespace App\Models;

use App\Traits\HasUserRoleAndPermission;
use Illuminate\Notifications\Notifiable;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements Transformable
{
    use Notifiable, TransformableTrait, HasUserRoleAndPermission;

    protected $fillable = [
        "name",
        "email",
        "password",
        "remember_token",
        "gender",
        "birthday",
        "last_logon",
        "active_code",
        "active",
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];
}
