<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penyewa', function (Blueprint $table) {
            $table->increments('id_penyewa');
            $table->text('nama');
            $table->bigInteger('no_identitas');
            $table->text('jenis_identitas');
            $table->bigInteger('telp');
            $table->longText('alamat');
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
        Schema::dropIfExists('tb_penyewa');
    }
}
