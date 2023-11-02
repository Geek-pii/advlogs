<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_loads', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->json('equipment_capacity')->nullable();
            $table->json('vehicle_types')->nullable();
            $table->json('routes')->nullable();
            $table->json('send_offer')->nullable();
            $table->string('max_offers',50)->nullable();
            $table->enum('truck_have_winch', ['Y', 'N'])->default('N');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrier_loads');
    }
}
