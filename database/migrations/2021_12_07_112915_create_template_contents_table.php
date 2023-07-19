<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_contents', function (Blueprint $table) {
            $table->id();
            $table->string('template_slug')->nullable();
            $table->string('page_slug')->nullable();
            $table->string('section_slug')->nullable();
            $table->string('key')->nullable();
            $table->longText('value')->nullable();
            $table->string('input_type')->nullable();
            $table->string('input_value')->nullable();
            $table->longText('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_contents');
    }
}
