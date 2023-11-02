<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Info;
class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = new Info();
        $info->name = 'More Info Goes Here';
        $info->save();

        // $info = new Info();
        // $info->name = 'Info';
        // $info->save();

        // $info = new Info();
        // $info->name = 'Goes';
        // $info->save();

        // $info = new Info();
        // $info->name = 'Here';
        // $info->save();
    }
}
