<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->id();
            $table->enum('use_factory', ['Y', 'N']);
            $table->string('pay_to')->nullable();
            $table->integer('days_paid')->unsigned();
            $table->string('day_type', 20);
            $table->string('fee', 10);
            $table->date('offer_start')->nullable();
            $table->date('offer_expiration')->nullable();
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
        Schema::dropIfExists('payment_plans');
    }
}
