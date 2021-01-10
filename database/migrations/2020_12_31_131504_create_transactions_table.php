<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function (Blueprint $table) {
			// Ghufron
			$table->id();
			$table->foreignId("product_id");
			$table->foreignId("user_id");
			$table->foreignId("warehouse_id");
			$table->foreignId("supplier_id");

			$table->string("product_name");
			$table->integer("product_volume");
			$table->string("product_category");
			$table->string("supplier_name");
			$table->string("supplier_address_city");
			$table->string("warehouse_name");
			$table->string("warehouse_location");


			$table->integer("qty");
			$table->integer("price");
			$table->integer("volume");
			$table->integer("total");
			$table->string("type");

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
		Schema::dropIfExists('transactions');
	}
}
