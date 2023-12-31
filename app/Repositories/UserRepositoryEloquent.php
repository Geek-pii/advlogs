<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
        return $this->model->select("id", "name", "email", "created_at");
    }

    public function store(array $input)
    {
        $input["password"] = Hash::make($input["password"]);

        $input["active"] = !empty($input["active"]) ? 1 : 0;

        $input["active_code"] = uniqid("", true);

        $user = $this->model->create($input);

        $user->syncRoles($input["role"]);

        if (!empty($input["permission"])) {
            $user->syncPermissions($input["permission"]);
        }
        return $user;
    }

    public function update(array $input, $id)
    {
        $user = $this->model->findOrFail($id);

        if (!empty($input["password"])) {
            $input["password"] = Hash::make($input["password"]);
        } else {
            unset($input["password"]);
        }

        $input["active"] = !empty($input["active"]) ? 1 : 0;

        $user->update($input);

        $user->syncRoles($input["role"]);

        if (!empty($input["permission"])) {
            $user->syncPermissions($input["permission"]);
        } else {
            $user->detachAllPermissions();
        }
        return $user;
    }
}
