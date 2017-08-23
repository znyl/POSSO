<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nama_product',255);
            $table->char('harga_product',255);
            $table->char('designer_product',255);
            $table->integer('diskon');
            $table->integer('status_product');
            $table->integer('category_id');
            $table->integer('file_gambar_id');
            $table->integer('lingkar_dada');
            $table->integer('lingkar_pinggul');
            $table->integer('panjang');
            $table->text('deskripsi_product');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
