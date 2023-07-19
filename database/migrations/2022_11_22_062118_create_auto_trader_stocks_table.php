<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoTraderStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_trader_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('year')->nullable();
            $table->string('price')->nullable();
            $table->string('priceCurrency')->nullable();
            $table->string('mileage')->nullable();
            $table->json('dealer')->nullable();
            $table->json('specification')->nullable();
            $table->longText('description')->nullable();
            $table->json('images')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('auto_trader_stocks');
    }
}
