<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyConstraintToSalaryCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_cycles', function (Blueprint $table) {
            $table->foreign('user_account_id')->references('id')->on('user_account');
            $table->foreign('salary_type_id')->references('id')->on('salary_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salary_cycles', function (Blueprint $table) {
            $table->dropColumn('user_account_id');
            $table->dropColumn('salary_type_id');
        });
    }
}
