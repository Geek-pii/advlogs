<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use InvalidArgumentException;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

trait HasRoleAndPermission
{
    /**
     * Property for caching roles.
     *
     * @var Collection|null
     */
    protected $roles;

    /**
     * Property for caching permissions.
     *
     * @var Collection|null
     */
    protected $permissions;

    /**
     * User belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles($fillableType = 'user')
    {
        return $this->belongsToMany(config('roles.models.role'), config('roles.roleUserTable'))->where('fillable_type', $fillableType)->withTimestamps();
    }

    /**
     * Get all roles as collection.
     *
     * @return Collection
     */
    public function getRoles($fillableType = 'user')
    {
        return (!$this->roles) ? $this->roles = $this->roles($fillableType)->get() : $this->roles;
    }

    /**
     * Check if the user has a role or roles.
     *
     * @param int|string|array $role
     * @param bool             $all
     *
     * @return bool
     */
    public function hasRole($role, $all = false, $fillableType = 'user')
    {
        if ($this->isPretendEnabled()) {
            return $this->pretend('hasRole');
        }

        if (!$all) {
            return $this->hasOneRole($role, $fillableType);
        }

        return $this->hasAllRoles($role, $fillableType);
    }

    /**
     * Check if the user has at least one of the given roles.
     *
     * @param int|string|array $role
     *
     * @return bool
     */
    public function hasOneRole($role, $fillableType = 'user')
    {
        foreach ($this->getArrayFrom($role) as $role) {
            if ($this->checkRole($role, $fillableType)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the user has all roles.
     *
     * @param int|string|array $role
     *
     * @return bool
     */
    public function hasAllRoles($role, $fillableType = 'user')
    {
        foreach ($this->getArrayFrom($role) as $role) {
            if (!$this->checkRole($role, $fillableType)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if the user has role.
     *
     * @param int|string $role
     *
     * @return bool
     */
    public function checkRole($role, $fillableType = 'user')
    {
        return $this->getRoles($fillableType)->contains(function ($value) use ($role) {
            return $role == $value->id || Str::is($role, $value->slug);
        });
    }

    /**
     * Attach role to a user.
     *
     * @param int|Role $role
     * @param enum|String $fillable_type
     *
     * @return null|bool
     */
    public function attachRole($role, $fillableType = 'user')
    {
        if ($this->getRoles($fillableType)->contains($role)) {
            return true;
        }
        $this->roles = null;

        return $this->roles()->attach($role, ['fillable_type' => $fillableType]);
    }

    /**
     * Detach role from a user.
     *
     * @param int|Role $role
     *
     * @return int
     */
    public function detachRole($role)
    {
        $this->roles = null;

        return $this->roles()->detach($role);
    }

    /**
     * Detach all roles from a user.
     *
     * @return int
     */
    public function detachAllRoles()
    {
        $this->roles = null;

        return $this->roles()->detach();
    }

    /**
     * Sync roles for a user.
     *
     * @param array|\jeremykenedy\LaravelRoles\Models\Role[]|\Illuminate\Database\Eloquent\Collection $roles
     *
     * @return array
     */
    public function syncRoles($roles)
    {
        $this->roles = null;

        return $this->roles()->sync($roles);
    }

    /**
     * Get role level of a user.
     *
     * @return int
     */
    public function level()
    {
        return ($role = $this->getRoles()->sortByDesc('level')->first()) ? $role->level : 0;
    }

    /**
     * Get all permissions from roles.
     *
     * @return Builder
     */
    public function rolePermissions($fillableType = 'user')
    {
        $permissionModel = app(config('roles.models.permission'));
        $roleTable = config('roles.rolesTable');

        if (!$permissionModel instanceof Model) {
            throw new InvalidArgumentException('[roles.models.permission] must be an instance of \Illuminate\Database\Eloquent\Model');
        }

        if (config('roles.inheritance')) {
            return $permissionModel
                ::select(['permissions.*', 'permission_role.created_at as pivot_created_at', 'permission_role.updated_at as pivot_updated_at'])
                ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
                ->join($roleTable, $roleTable.'.id', '=', 'permission_role.role_id')
                ->whereIn($roleTable.'.id', $this->getRoles($fillableType)->pluck('id')->toArray())
                ->orWhere($roleTable.'.level', '<', $this->level())
                ->groupBy(['permissions.id', 'permissions.name', 'permissions.slug', 'permissions.description', 'permissions.model', 'permissions.created_at', 'permissions.updated_at', 'permissions.deleted_at', 'pivot_created_at', 'pivot_updated_at']);
        } else {
            return $permissionModel
                ::select(['permissions.*', 'permission_role.created_at as pivot_created_at', 'permission_role.updated_at as pivot_updated_at'])
                ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
                ->join($roleTable, $roleTable.'.id', '=', 'permission_role.role_id')
                ->whereIn($roleTable.'.id', $this->getRoles($fillableType)->pluck('id')->toArray())
                ->groupBy(['permissions.id', 'permissions.name', 'permissions.slug', 'permissions.description', 'permissions.model', 'permissions.created_at', 'permissions.updated_at', 'permissions.deleted_at', 'pivot_created_at', 'pivot_updated_at']);
        }
    }

    /**
     * User belongs to many permissions.
     *
     * @return BelongsToMany
     */
    public function userPermissions($fillableType = 'user')
    {
        return $this->belongsToMany(config('roles.models.permission'))->where('fillable_type', $fillableType)->withTimestamps();
    }

    /**
     * Get all permissions as collection.
     *
     * @return Collection
     */
    public function getPermissions($fillableType = 'user')
    {
        return (!$this->permissions) ? $this->permissions = $this->rolePermissions($fillableType)->get()->merge($this->userPermissions($fillableType)->get()) : $this->permissions;
    }

    /**
     * Check if the user has a permission or permissions.
     *
     * @param int|string|array $permission
     * @param bool             $all
     *
     * @return bool
     */
    public function hasPermission($permission, $all = false, $fillableType = 'user')
    {
        if ($this->isPretendEnabled()) {
            return $this->pretend('hasPermission');
        }

        if (!$all) {
            return $this->hasOnePermission($permission, $fillableType);
        }

        return $this->hasAllPermissions($permission, $fillableType);
    }

    /**
     * Check if the user has at least one of the given permissions.
     *
     * @param int|string|array $permission
     *
     * @return bool
     */
    public function hasOnePermission($permission, $fillableType = 'user')
    {
        foreach ($this->getArrayFrom($permission) as $permission) {
            if ($this->checkPermission($permission, $fillableType)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the user has all permissions.
     *
     * @param int|string|array $permission
     *
     * @return bool
     */
    public function hasAllPermissions($permission, $fillableType = 'user')
    {
        foreach ($this->getArrayFrom($permission) as $permission) {
            if (!$this->checkPermission($permission, $fillableType)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if the user has a permission.
     *
     * @param int|string $permission
     *
     * @return bool
     */
    public function checkPermission($permission, $fillableType = 'user')
    {
        return $this->getPermissions($fillableType)->contains(function ($value) use ($permission) {
            return $permission == $value->id || Str::is($permission, $value->slug);
        });
    }

    /**
     * Check if the user is allowed to manipulate with entity.
     *
     * @param string $providedPermission
     * @param Model  $entity
     * @param bool   $owner
     * @param string $ownerColumn
     *
     * @return bool
     */
    public function allowed($providedPermission, Model $entity, $owner = true, $ownerColumn = 'user_id')
    {
        if ($this->isPretendEnabled()) {
            return $this->pretend('allowed');
        }

        if ($owner === true && $entity->{$ownerColumn} == $this->id) {
            return true;
        }

        return $this->isAllowed($providedPermission, $entity);
    }

    /**
     * Check if the user is allowed to manipulate with provided entity.
     *
     * @param string $providedPermission
     * @param Model  $entity
     *
     * @return bool
     */
    protected function isAllowed($providedPermission, Model $entity, $fillableType = 'user')
    {
        foreach ($this->getPermissions($fillableType) as $permission) {
            if ($permission->model != '' && get_class($entity) == $permission->model
                && ($permission->id == $providedPermission || $permission->slug === $providedPermission)
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Attach permission to a user.
     *
     * @param int|Permission $permission
     *
     * @return null|bool
     */
    public function attachPermission($permission, $fillableType = 'user')
    {
        if ($this->getPermissions($fillableType)->contains($permission)) {
            return true;
        }
        $this->permissions = null;

        return $this->userPermissions()->attach($permission, ['fillable_type' => $fillableType]);
    }

    /**
     * Detach permission from a user.
     *
     * @param int|Permission $permission
     *
     * @return int
     */
    public function detachPermission($permission)
    {
        $this->permissions = null;

        return $this->userPermissions()->detach($permission);
    }

    /**
     * Detach all permissions from a user.
     *
     * @return int
     */
    public function detachAllPermissions()
    {
        $this->permissions = null;

        return $this->userPermissions()->detach();
    }

    /**
     * Sync permissions for a user.
     *
     * @param array|\jeremykenedy\LaravelRoles\Models\Permission[]|\Illuminate\Database\Eloquent\Collection $permissions
     *
     * @return array
     */
    public function syncPermissions($permissions, $fillableType = 'user')
    {
        $this->permissions = null;

        return $this->userPermissions($fillableType)->sync($permissions);
    }

    /**
     * Check if pretend option is enabled.
     *
     * @return bool
     */
    private function isPretendEnabled()
    {
        return (bool) config('roles.pretend.enabled');
    }

    /**
     * Allows to pretend or simulate package behavior.
     *
     * @param string $option
     *
     * @return bool
     */
    private function pretend($option)
    {
        return (bool) config('roles.pretend.options.'.$option);
    }

    /**
     * Get an array from argument.
     *
     * @param int|string|array $argument
     *
     * @return array
     */
    private function getArrayFrom($argument)
    {
        return (!is_array($argument)) ? preg_split('/ ?[,|] ?/', $argument) : $argument;
    }

    public function callMagic($method, $parameters)
    {
        if (starts_with($method, 'is')) {
            return $this->hasRole(snake_case(substr($method, 2), config('roles.separator')));
        } elseif (starts_with($method, 'can')) {
            return $this->hasPermission(snake_case(substr($method, 3), config('roles.separator')));
        } elseif (starts_with($method, 'allowed')) {
            return $this->allowed(snake_case(substr($method, 7), config('roles.separator')), $parameters[0], (isset($parameters[1])) ? $parameters[1] : true, (isset($parameters[2])) ? $parameters[2] : 'user_id');
        }

        return parent::__call($method, $parameters);
    }

    public function __call($method, $parameters)
    {
        return $this->callMagic($method, $parameters);
    }
}
