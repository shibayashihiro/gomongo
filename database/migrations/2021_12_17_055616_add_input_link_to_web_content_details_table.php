<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInputLinkToWebContentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_content_details', function (Blueprint $table) {
            $table->unsignedBigInteger('website_id')->after('user_id');
            $table->string('input_type')->default('text')->after('value');
            $table->integer('is_required')->default(0)->after('input_type');

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
        Schema::table('web_content_details', function (Blueprint $table) {
            $table->dropColumn('website_id');
            $table->dropColumn('input_type');
            $table->dropColumn('is_required');
        });
    }
}
