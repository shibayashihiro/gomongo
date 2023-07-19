<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinkToWebContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_contents', function (Blueprint $table) {
            $table->longText('facebook_link')->nullable()->after('copyright');
            $table->longText('instagram_link')->nullable()->after('facebook_link');
            $table->longText('twitter_link')->nullable()->after('instagram_link');
            $table->longText('linkedin_link')->nullable()->after('twitter_link');
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
            $table->dropColumn('facebook_link');
            $table->dropColumn('instagram_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('linkedin_link');
        });
    }
}
