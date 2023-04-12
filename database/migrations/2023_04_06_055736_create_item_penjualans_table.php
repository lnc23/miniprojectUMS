<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_penjualans', function (Blueprint $table) {
            $table->bigIncrements('id_item');
            $table->unsignedBigInteger('nota');
            $table->foreign('nota')->references('id_nota')->on('penjualans');
            $table->unsignedBigInteger('kode_barang');
            $table->foreign('kode_barang')->references('kode')->on('barangs');
            $table->integer('qty');
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
        Schema::dropIfExists('item_penjualans');
    }
}
