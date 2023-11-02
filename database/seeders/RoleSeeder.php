<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::count();
        if ($roles == 0) {
            $adminRoles = [
                [
                    'name' => 'Admin',
                    'slug' => 'admin',
                    'fillable_type' => 'user',
                    'description' => '', // optional
                    'level' => 1, // optional, set to 1 by default level cao co permission level thap
                ]
            ];
            $userRoles = [
                [
                    'name' => 'Company Creator',
                    'slug' => 'company.creator',
                    'fillable_type' => 'account',
                    'description' => 'Who Created This Company', 
                    'level' => 2, 
                ],
                [
                    'name' => 'Dispatch Primary',
                    'slug' => 'dispatch.primary',
                    'fillable_type' => 'account',
                    'description' => 'Carrier Dispatch Primary', 
                    'level' => 2, 
                ],
                [
                    'name' => 'Dispatch Alternative',
                    'slug' => 'dispatch.alternative',
                    'fillable_type' => 'account',
                    'description' => 'Carrier Dispatch Alternative', 
                    'level' => 3, 
                ],
                [
                    'name' => 'Operator Manager',
                    'slug' => 'ops.mgr',
                    'fillable_type' => 'account',
                    'description' => 'operator manager fot both carrier/client', 
                    'level' => 4, 
                ],
                [
                    'name' => 'AP Primary',
                    'slug' => 'ap.primary',
                    'fillable_type' => 'account',
                    'description' => 'account payable', 
                    'level' => 5, 
                ],
                [
                    'name' => 'AP Alternative',
                    'slug' => 'ap.alternative',
                    'fillable_type' => 'account',
                    'description' => 'Not used for the moment', 
                    'level' => 6, 
                ],
                [
                    'name' => 'AR Primary',
                    'slug' => 'ar.primary',
                    'fillable_type' => 'account',
                    'description' => 'Carrier flow accounts rceiver', 
                    'level' => 7, 
                ],
                [
                    'name' => 'AR Alternative',
                    'slug' => 'ar.alternative',
                    'fillable_type' => 'account',
                    'description' => 'Carrier flow No ar alt for the moment (add alternative contact)', 
                    'level' => 8, 
                ],
                [
                    'name' => '3P Buyer',
                    'slug' => '3p.buyer',
                    'fillable_type' => 'account',
                    'description' => '', 
                    'level' => 9, 
                ],
                [
                    'name' => 'Business Primary',
                    'slug' => 'biz.primary',
                    'fillable_type' => 'account',
                    'description' => '', 
                    'level' => 10, 
                ],
                [
                    'name' => 'Business Alternative',
                    'slug' => 'biz.alternative',
                    'fillable_type' => 'account',
                    'description' => 'business alternative', 
                    'level' => 11, 
                ],
            ];
            $roles = [...$adminRoles, ...$userRoles];
            foreach($roles as $role) {
                $admin = Role::query()->create($role);
            }
            $permissions = Permission::query()->get()->pluck("id")->toArray();
            Role::first()->syncPermissions($permissions);
        }
       
    }
}
