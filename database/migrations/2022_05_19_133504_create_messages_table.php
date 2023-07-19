<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('threads_id');
            $table->unsignedBigInteger('sender_id');
            $table->enum('sender_type', ['guest', 'user'])->default('guest');
            $table->unsignedBigInteger('receiver_id');
            $table->enum('receiver_type', ['guest', 'user'])->default('user');
            $table->text('message')->nullable();
            $table->text('file')->nullable();
            $table->enum('type', ['message', 'file'])->default('message');
            $table->enum('status', ['read', 'unread'])->default('unread');
            $table->enum('sender_status', ['y', 'n'])->default('y');
            $table->enum('receiver_status', ['y', 'n'])->default('y');
            $table->foreign('threads_id')->references('id')->on('threads')->cascadeOnDelete();
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
        Schema::dropIfExists('messages');
    }
}
