<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use jeremykenedy\LaravelRoles\Models\Role as JeremykenedyRole;

class Role extends JeremykenedyRole implements Transformable
{
    use TransformableTrait;

    protected $table = "roles";

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
