<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyConstraintToOrderhead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orderhead', function (Blueprint $table) {
            // $table->foreign('user_account_id')->references('ID')->on('user_account');
            // $table->foreign('salary_cycle_id')->references('id')->on('salary_cycle');
            $table->foreign('order_status_id')->references('ID')->on('orderstatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderhead', function (Blueprint $table) {
            // $table->dropColumn('user_account_id');
            // $table->dropColumn('salary_cycle_id');
            $table->dropColumn('order_status_id');
        });
    }
}
