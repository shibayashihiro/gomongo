<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_management', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('subject')->nullable();
            $table->longText('description')->nullable();
            $table->string('assign_staff')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_contact_number')->nullable();
            $table->longText('additional_note')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['open', 'resolved'])->default('open');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint_management');
    }
}
