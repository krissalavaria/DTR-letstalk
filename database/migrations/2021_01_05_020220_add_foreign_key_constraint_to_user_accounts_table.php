<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyConstraintToUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_account', function (Blueprint $table) {
            // $table->foreign('barangay_id')->references('ID')->on('barangays');
            // $table->foreign('city_municipality_id')->references('ID')->on('city_municipality');
            // $table->foreign('province_id')->references('ID')->on('province');
            // $table->foreign('company_profile_id')->references('ID')->on('company_profile');
            $table->foreign('department_id')->references('ID')->on('department');
            $table->foreign('designation_id')->references('ID')->on('designation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_account', function (Blueprint $table) {
            // $table->dropColumn('barangay_id');
            // $table->dropColumn('city_municipality_id');
            // $table->dropColumn('province_id');
            // $table->dropColumn('company_profile_id');
            $table->dropColumn('department_id');
            $table->dropColumn('designation_id');
        });
    }
}
