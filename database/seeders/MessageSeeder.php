<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $msg = new Message();
        $msg->message ="Thank you for the opportunity. Jeremiah will send your quote to soon.Please add jessary@advlogs.com to your email contacts so your quote is not misdirected to a spam or junkfolder";
        $msg->save();
    }
}
