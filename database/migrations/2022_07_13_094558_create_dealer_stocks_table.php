<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('stock_item_id')->nullable();
            $table->string('category')->nullable();
            $table->string('registration')->nullable();
            $table->string('reg_code')->nullable();
            $table->string('make')->nullable();
            $table->string('modal')->nullable();
            $table->text('derivative')->nullable();
            $table->text('attention_grabber')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('engine_size_unit')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('manufacture')->nullable();
            $table->string('mileage')->nullable();
            $table->string('mileage_unit')->nullable();
            $table->string('body_type')->nullable();
            $table->string('colour')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('doors')->nullable();
            $table->integer('previous_owners')->nullable();
            $table->double('price')->default(0);
            $table->string('price_extra')->nullable();
            $table->string('wheel_base')->nullable();
            $table->string('cab_type')->nullable();
            $table->string('four_wheel')->nullable();
            $table->string('franchise_approved')->nullable();
            $table->string('style')->nullable();
            $table->string('sub_style')->nullable();
            $table->string('hours')->nullable();
            $table->string('number_of_berths')->nullable();
            $table->string('axls')->nullable();
            $table->string('dealer_reference')->nullable();
            $table->longText('images')->nullable();
            $table->longText('video_url')->nullable();
            $table->string('date_of_registration')->nullable();
            $table->text('service_history')->nullable();
            $table->longText('key_information')->nullable();
            $table->longText('other_vehicle_text')->nullable();
            $table->string('closer')->nullable();
            $table->longText('feature')->nullable();
            $table->string('vatstatus')->nullable();
            $table->string('api_id')->nullable();
            $table->string('mot_date')->nullable();
            $table->string('VIN')->nullable();
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
        Schema::dropIfExists('dealer_stocks');
    }
}
