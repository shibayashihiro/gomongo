<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedStatusToVehicleStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_stocks', function (Blueprint $table) {
            $table->enum('deleted_status', ['yes', 'no'])->default('no')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_stocks', function (Blueprint $table) {
            $table->dropColumn('deleted_status');
        });
    }
}
