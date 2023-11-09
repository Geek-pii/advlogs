<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCarrierLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrier_loads', function (Blueprint $table) {
            $table->tinyInteger('no_future_loads')->default(0);
            $table->tinyInteger('has_notification_request')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrier_loads', function (Blueprint $table) {
            $table->dropColumn('no_future_loads');
            $table->dropColumn('has_notification_request');
        });
    }
}
