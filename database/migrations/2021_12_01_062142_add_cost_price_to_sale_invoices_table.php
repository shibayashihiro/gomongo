<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostPriceToSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->string('cost_price')->nullable()->after('card_price');
            $table->string('sales_price')->nullable()->after('cost_price');
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
            $table->dropColumn('cost_price');
            $table->dropColumn('sales_price');
        });
    }
}
