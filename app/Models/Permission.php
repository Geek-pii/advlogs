<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use jeremykenedy\LaravelRoles\Models\Permission as JeremykenedyPermission;

class Permission extends JeremykenedyPermission implements Transformable
{
    use TransformableTrait;

    protected $table = "permissions";

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
