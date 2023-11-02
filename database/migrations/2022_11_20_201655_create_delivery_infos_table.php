<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDeliveryInfosTable.
 */
class CreateDeliveryInfosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_infos', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('account_id')->unsigned();
			$table->string('location_type');
			$table->string('street_address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->string('company_name')->nullable();
			$table->string('contact_name');
			$table->string('contact_email');
			$table->string('contact_phone');
			$table->string('contact_phone_1')->nullable();
			$table->text('notes')->nullable();
            $table->timestamps();
			$table->index('account_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delivery_infos');
	}
}
