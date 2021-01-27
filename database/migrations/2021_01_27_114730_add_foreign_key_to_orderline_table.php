<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToOrderlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orderline', function (Blueprint $table) {
            // $table->foreign('product_id')->references('ID')->on('product');
            $table->foreign('product_unit')->references('ID')->on('product_unit');
            $table->foreign('product_category_id')->references('ID')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderline', function (Blueprint $table) {
            // $table->dropColumn('product_id');
            $table->dropColumn('product_unit');
            $table->dropColumn('product_category_id');
        });
    }
}
