<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleToWebFinanceApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_finance_applications', function (Blueprint $table) {
            $table->string('vehicle_registration_number')->nullable()->after('template_slug');
            $table->string('mileage')->nullable()->after('vehicle_registration_number');
            $table->string('vehicle_price')->nullable()->after('mileage');
            $table->string('deposit_amount')->nullable()->after('vehicle_price');
            $table->string('part_exchange_value')->nullable()->after('deposit_amount');
            $table->string('settlement_figure')->nullable()->after('part_exchange_value');
            $table->string('term_of_agreement')->nullable()->after('settlement_figure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_finance_applications', function (Blueprint $table) {
            $table->dropColumn('vehicle_registration_number');
            $table->dropColumn('mileage');
            $table->dropColumn('vehicle_price');
            $table->dropColumn('deposit_amount');
            $table->dropColumn('part_exchange_value');
            $table->dropColumn('settlement_figure');
            $table->dropColumn('term_of_agreement');
        });
    }
}
