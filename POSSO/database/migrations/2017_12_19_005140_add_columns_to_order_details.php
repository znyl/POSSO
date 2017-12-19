<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
            $table->char('total',255)->after('total_harga');
            $table->integer('qty')->after('total_harga');
            $table->integer('tipe_transaksi')->after('total_harga');
            $table->renameColumn('size_product','size_id');
            $table->integer('diskon_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
            $table->dropColumn('total');
            $table->dropColumn('qty');
            $table->dropColumn('tipe_transaksi');
            $table->dropColumn('diskon_id');
            $table->renameColumn('size_id','size_product');
        });
    }
}
