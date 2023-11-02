<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRollsSteersBrakesColumnToGetAQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('get_a_quote', function (Blueprint $table) {
            $table->string('rolls_steers_brakes')->nullable()->after('run_drives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('get_a_quote', function (Blueprint $table) {
            $table->dropColumn('rolls_steers_brakes');
        });
    }
}
