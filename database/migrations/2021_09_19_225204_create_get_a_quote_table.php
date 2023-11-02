<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetAQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_a_quote', function (Blueprint $table) {
            $table->id();
            $table->string('picking_zip')->nullable();
            $table->string('delivery_zip')->nullable();
            $table->string('preferred_pick_up_date')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('condition')->nullable();
            $table->string('run_drives')->nullable();
            $table->string('transport_type')->nullable();
            $table->string('transport_speed')->nullable();
            $table->string('is_modifications')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('get_a_quote');
    }
}
