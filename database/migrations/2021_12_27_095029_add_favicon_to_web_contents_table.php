<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFaviconToWebContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_contents', function (Blueprint $table) {
            $table->longText('favicon')->nullable()->after('domain_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_contents', function (Blueprint $table) {
            $table->dropColumn('favicon');
        });
    }
}
