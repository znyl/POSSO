<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_order', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_order',255);
            $table->char('nama_konsumen',255);
            $table->char('alamat_konsumen',255);
            $table->char('no_telp_konsumen',255);
            $table->char('email_konsumen',255);
            $table->char('budget',255);
            $table->integer('image_ref_id')->nullable();
            $table->integer('category_id');
            $table->text('keterangan')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('custom_order');
    }
}
