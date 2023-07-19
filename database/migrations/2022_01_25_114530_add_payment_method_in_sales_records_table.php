<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentMethodInSalesRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_records', function (Blueprint $table) {
            $table->double('total_case_payment')->default(0)->after('sales_price');
            $table->double('total_card_payment')->default(0)->after('total_case_payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_records', function (Blueprint $table) {
            //
        });
    }
}
