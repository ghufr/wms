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
            $table->integer("qty");
            $table->integer("price");
            $table->integer("volume");
            $table->integer("total");
            // $table->string("");

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
