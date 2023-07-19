<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionPlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->text('slug')->nullable();
            $table->longText('description')->nullable();
            $table->integer('qty')->nullable();
            $table->foreign('plan_id')->references('id')->on('subscription_plans')->cascadeOnDelete();
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
        Schema::dropIfExists('subscription_plan_details');
    }
}
