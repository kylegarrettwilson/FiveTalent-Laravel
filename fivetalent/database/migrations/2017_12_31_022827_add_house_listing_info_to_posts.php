<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHouseListingInfoToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function($table){

            //$table->integer('user_id');

            $table->integer('mls');
            $table->string('street_1');
            $table->string('street_2');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('neighbourhood');
            $table->integer('sales_price');
            $table->integer('date_listed');
            $table->integer('bedroom_number');
            $table->integer('bath_number');
            $table->integer('squarefeet');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table){

            //$table->dropColumn('user_id');

            $table->dropcolumn('mls');
            $table->dropColumn('street_1');
            $table->dropColumn('street_2');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zipcode');
            $table->dropColumn('neighbourhood');
            $table->dropColumn('sales_price');
            $table->dropColumn('date_listed');
            $table->dropColumn('bedroom_number');
            $table->dropColumn('bath_number');
            $table->dropColumn('squarefeet');

        });
    }
}
