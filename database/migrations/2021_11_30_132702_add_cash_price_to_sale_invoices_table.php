<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCashPriceToSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->string('cash_price')->nullable()->after('discount_description');
            $table->string('card_price')->nullable()->after('cash_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->dropColumn('cash_price');
            $table->dropColumn('card_price');
        });
    }
}
