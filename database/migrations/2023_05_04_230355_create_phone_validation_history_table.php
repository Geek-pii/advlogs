<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneValidationHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_validation_history', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->comment('phone number');
            $table->string('type')->comment('validation type:mobile_number, contact_phone_number');
            $table->text('api_result');
            $table->timestamps();
            $table->index(['phone_number', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_validation_history');
    }
}
