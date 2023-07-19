<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('company_name')->after('name');
            $table->string('postcode')->after('type')->nullable();
            $table->string('address')->after('postcode')->nullable();
            $table->string('country_code')->after('email')->default('+91');
            $table->string('mobile')->after('country_code')->nullable();
            $table->text('cmp_reg_number')->after('address')->nullable();
            $table->text('fca_reg_number')->after('cmp_reg_number')->nullable();
            $table->text('vat_number')->after('fca_reg_number')->nullable();
            $table->text('ico_number')->after('vat_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
