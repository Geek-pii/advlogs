<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinApiCallHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_api_call_history', function (Blueprint $table) {
            $table->id();
            $table->string("process_number", 50);
            $table->string('process_name', 50);
            $table->string('process_type', 50);
            $table->text('response');
            $table->timestamps();
            $table->index(['process_number', 'process_name',  'process_type'],'idx_process_number_name_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tin_api_call_history');
    }
}
