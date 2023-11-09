<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('carrier_or_dot_search')->nullable();
            $table->string('mc_number')->nullable();
            $table->string('dot_number')->nullable();
            $table->string('carrier_certificate_person')->nullable();
            $table->string('carrier_certificate_email')->nullable();
            $table->string('carrier_certificate_fax')->nullable();
            $table->boolean('skip_certification')->default(false);
            $table->string('agreement_checked_date')->nullable();
            $table->string('agreement_checked_account_id')->nullable();
            $table->boolean('agreement_checked')->default(false);         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'carrier_or_dot_search',
                'mc_number',
                'dot_number',
                'carrier_certificate_person',
                'carrier_certificate_email',
                'carrier_certificate_fax',
                'skip_certification',
                'agreement_checked_date',
                'agreement_checked_account_id',
                'agreement_checked',
            ]);
        });
    }
}
