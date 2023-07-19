<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleStockAdditionalPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_stock_additional_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_stock_id')->nullable();
            $table->longText('description')->nullable();
            $table->double('price')->default(0);
            $table->foreign('vehicle_stock_id')->references('id')->on('vehicle_stocks')->cascadeOnDelete();
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
        Schema::dropIfExists('vehicle_stock_additional_prices');
    }
}
