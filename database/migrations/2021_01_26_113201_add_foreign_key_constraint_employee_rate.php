<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyConstraintEmployeeRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_rate', function (Blueprint $table) {
            $table->foreign('user_account_id')->references('id')->on('user_account');
            $table->foreign('salary_cycle_id')->references('ID')->on('salary_cycle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_rate', function (Blueprint $table) {
            $table->dropColumn('user_account_id');
            $table->dropColumn('salary_cycle_id');
        });
    }
}
