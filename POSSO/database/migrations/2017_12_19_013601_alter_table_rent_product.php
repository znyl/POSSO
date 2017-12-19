<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_rent', function (Blueprint $table) {
            //
            $table->renameColumn('order_id','order_detail_id');
            $table->dropColumn('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_rent', function (Blueprint $table) {
            //
            $table->renameColumn('order_detail_id', 'order_id');
            $table->integer('product_id');
        });
    }
}
