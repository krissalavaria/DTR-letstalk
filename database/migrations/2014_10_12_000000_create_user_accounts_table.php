<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_account', function (Blueprint $table) {
            $table->id();
            $table->string('auth_token');
            $table->string('locker');
            $table->string('employee_no');
            $table->string('username');
            $table->string('password');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('birthday');
            $table->string('contact_number');
            $table->string('contact_person');
            $table->integer('security_pin');
            $table->string('blk_door');
            $table->string('street');
            $table->unsignedBigInteger('barangay_id');
            $table->unsignedBigInteger('city_municipality_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('company_profile_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('designation_id');
            $table->tinyInteger('disable');
            $table->rememberToken();
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
        Schema::dropIfExists('user_account');
    }
}
