<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToWebFinanceApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_finance_applications', function (Blueprint $table) {
            $table->enum('status', ['received', 'contacted_broker', 'approved', 'declined', 'completed'])->default('received')->after('note');
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
            $table->dropColumn('status');
        });
    }
}
