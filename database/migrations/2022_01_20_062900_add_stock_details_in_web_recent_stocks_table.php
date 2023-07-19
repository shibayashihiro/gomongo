<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStockDetailsInWebRecentStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_recent_stocks', function (Blueprint $table) {
            $table->string('category')->nullable()->after('image');
            $table->string('transmission')->nullable()->after('category');
            $table->string('fuel')->nullable()->after('transmission');
            $table->string('bhp')->nullable()->after('fuel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_recent_stocks', function (Blueprint $table) {
            //
        });
    }
}
