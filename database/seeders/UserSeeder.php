<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->where('email', 'admin@admin.com')->first();
        if (!$user) {
            $arr = [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('aaaaaaaa'),
                'active' => 1,
                'active_code' => uniqid()
            ];

            $user = User::query()->create($arr);
        }
        $admin = Role::query()->where('slug', 'admin')->first();
        if ($admin) {
            $user->syncRoles([$admin->id]);
        }
    }
}
