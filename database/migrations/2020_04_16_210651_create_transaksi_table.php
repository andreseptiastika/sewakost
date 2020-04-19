<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->integer('id_kamar');
            $table->integer('id_penyewa');
            $table->date('tgl_masuk');
            $table->date('tgl_keluar');
            $table->date('tgl_bayar');
            $table->bigInteger ('biaya');
            $table->bigInteger('jumlah_bayar');
            $table->date('batas_tempo');
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
        Schema::dropIfExists('transaksi');
    }
}
