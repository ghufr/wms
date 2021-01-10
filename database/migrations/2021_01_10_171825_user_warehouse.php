<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserWarehouse extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_warehouse', function (Blueprint $table) {

			// $table->integer('user_id')->unsigned();
			// $table->integer('warehouse_id')->unsigned();
			$table->id();
			$table->foreignId('user_id')->onDelete('cascade');
			$table->foreignId('warehouse_id')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('user_warehouse');
	}
}
