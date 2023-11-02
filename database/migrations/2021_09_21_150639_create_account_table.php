<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('mobile_number')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('email');
            $table->string('alternate_email')->nullable();
            $table->string('password')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('primary_contact_number')->nullable();
            $table->string('job_title')->nullable();
            $table->string('business_phone_number')->nullable();
            $table->string('business_phone_ext')->nullable();
            $table->json('invoice_emails')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('account');
    }
}
