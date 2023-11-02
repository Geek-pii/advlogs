<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Support\Str;
use App\Validators\RoleValidator;
use App\Repositories\RoleRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function datatable()
    {
        return $this->model->select("id", "name", "slug", "level");
    }

    public function create(array $input)
    {
        $input['slug'] = Str::slug($input['name'], '_');

        $role = $this->model->create($input);

        if (!empty($input["permission"])) {
            $role->syncPermissions($input["permission"]);
        }
        return $role;
    }

    public function update(array $input, $id)
    {
        $role = $this->model->findOrFail($id);

        $role->update($input);

        if (!empty($input["permission"])) {
            $role->syncPermissions($input["permission"]);
        } else {
            $role->detachAllPermissions();
        }
        return $role;
    }
}
