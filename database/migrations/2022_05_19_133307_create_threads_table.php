<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('guest_id')->references('id')->on('device_tokens');
            $table->foreign('user_id')->references('id')->on('device_tokens');
            $table->enum('is_active', ['y', 'n'])->default('y');
            $table->enum('guest_status', ['y', 'n'])->default('y');
            $table->enum('user_status', ['y', 'n'])->default('y');
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
        Schema::dropIfExists('threads');
    }
}
