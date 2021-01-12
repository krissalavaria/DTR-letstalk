<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_cycle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_account_id');
            $table->unsignedBigInteger('salary_type_id');
            $table->tinyInteger('is_cleared');
            $table->date('cycle_date');
            $table->date('date_created');
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
        Schema::dropIfExists('salary_cycle');
    }
}
