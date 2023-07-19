<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWebContentToWebFinanceApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_finance_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('website_id')->nullable()->after('id')->nullable();
            $table->string('domain_slug')->nullable()->after('website_id');
            $table->foreign('website_id')->references('id')->on('web_contents')->cascadeOnDelete();
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
            $table->dropColumn('website_id');
            $table->dropColumn('domain_slug');
        });
    }
}
