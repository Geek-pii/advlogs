<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneNumberTypesToAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->string('mobile_number_type')->nullable();
            $table->string('primary_contact_number_type')->nullable();
            $table->string('business_phone_number_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->dropColumn(['mobile_number_type', 'primary_contact_number_type', 'business_phone_number_type']);
        });
    }
}
