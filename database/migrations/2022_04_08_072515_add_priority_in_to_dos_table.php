<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityInToDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('to_dos', function (Blueprint $table) {
            $table->enum('priority', ['low', 'medium', 'high'])->default('low')->after('assign_staff');
            $table->enum('status', ['pending', 'complete'])->default('pending')->after('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('to_dos', function (Blueprint $table) {
            //
        });
    }
}
