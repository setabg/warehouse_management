<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('warehouse_id');
        $table->string('name');
        $table->bigInteger('barcode')->unique();
        $table->timestamps();
        $table->foreign('warehouse_id')->references('id')->on('warehouses');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
