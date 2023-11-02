<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions  = config("permission");

        foreach ($permissions as $permission) {
            foreach ($permission["permissions"] as $key => $name) {
                $check = Permission::query()->where("slug", $key)->first();
                if (!$check) {
                    $arr = [
                        "model" => $permission["model"],
                        "slug" => $key,
                        'fillable_type' => 'user',
                        "name" => $name,
                        "description" => $name
                    ];
                    Permission::query()->create($arr);
                }
            }
        }

        // Remove cache permission
        removeAllConfig();
    }
}
