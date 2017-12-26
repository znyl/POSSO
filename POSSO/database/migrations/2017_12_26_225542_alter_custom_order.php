<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCustomOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_order', function (Blueprint $table) {
            //
            $table->integer('qty');
            $table->integer('tipe_transaksi');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_order', function (Blueprint $table) {
            //
            $table->dropColumn('qty');
            $table->dropColumn('tipe_transaksi');

        });
    }
}
