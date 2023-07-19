<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebFinanaceApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_finance_applications', function (Blueprint $table) {
            $table->id();
            $table->string('template_slug')->nullable();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('no_dependant')->nullable();
            $table->string('driving_licence')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('building_name')->nullable();
            $table->string('building_number')->nullable();
            $table->string('building_floor')->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('residency')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('emp_occupation')->nullable();
            $table->string('emp_occupation_basis')->nullable();
            $table->string('emp_occupation_type')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_lat')->nullable();
            $table->string('emp_lng')->nullable();
            $table->string('emp_building_name')->nullable();
            $table->string('emp_building_number')->nullable();
            $table->string('emp_building_floor')->nullable();
            $table->string('emp_street')->nullable();
            $table->string('emp_district')->nullable();
            $table->string('emp_city')->nullable();
            $table->string('emp_postcode')->nullable();
            $table->string('emp_residency')->nullable();
            $table->string('bank_sort_code')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('gross_annual_income')->nullable();
            $table->string('replacement_loan')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('web_finanace_applications');
    }
}
