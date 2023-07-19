<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->foreign('complaint_id')->references('id')->on('complaint_management')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint_notes');
    }
}
