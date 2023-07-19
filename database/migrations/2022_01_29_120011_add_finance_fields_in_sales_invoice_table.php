<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinanceFieldsInSalesInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->enum('finance_flag', ['0', '1'])->default('0')->after('part_exchange_description');
            $table->string('finance_cost')->nullable()->after('finance_flag');
            $table->text('finance_description')->nullable()->after('finance_cost');
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
            //
        });
    }
}
