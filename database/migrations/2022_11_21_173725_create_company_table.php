<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCompanyTable.
 */
class CreateCompanyTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
            $table->increments('id');
			$table->enum('use_factory', ['Y', 'N'])->nullable();
			$table->integer('account_id')->unsigned()->nullable();
			$table->string('company_legal_name');
			$table->string('company_dba')->nullable();
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
		Schema::drop('companies');
	}
}
