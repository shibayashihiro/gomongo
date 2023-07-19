<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['sales', 'deposit'])->default('sales');
            $table->string('registration_number')->nullable();
            $table->string('model')->nullable();
            $table->string('mileage')->nullable();
            $table->string('vin_number')->nullable();
            $table->dateTime('date_registration')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('customer_name')->nullable();
            $table->longText('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('price')->nullable();
            $table->enum('admin_fee_flag', ['0', '1'])->default('0');
            $table->string('admin_cost')->nullable();
            $table->string('admin_description')->nullable();
            $table->enum('product_flag', ['0', '1'])->default('0');
            $table->string('product_cost')->nullable();
            $table->string('product_description')->nullable();
            $table->enum('part_exchange_flag', ['0', '1'])->default('0');
            $table->string('part_exchange_cost')->nullable();
            $table->string('part_exchange_description')->nullable();
            $table->enum('deposit_flag', ['0', '1'])->default('0');
            $table->string('deposit_cost')->nullable();
            $table->string('deposit_description')->nullable();
            $table->enum('discount_flag', ['0', '1'])->default('0');
            $table->string('discount_cost')->nullable();
            $table->string('discount_description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_invoices');
    }
}
