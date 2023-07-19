<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFooterToWebContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_contents', function (Blueprint $table) {
            $table->longText('header_logo')->nullable()->after('fca_number');
            $table->longText('footer_logo')->nullable()->after('header_logo');
            $table->longText('footer_text')->nullable()->after('footer_logo');
            $table->longText('copyright')->nullable()->after('footer_text');
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
            //
        });
    }
}
