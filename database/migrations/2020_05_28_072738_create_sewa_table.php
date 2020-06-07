<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sewa', function (Blueprint $table) {
            $table->increments('id_sewa');
            $table->text('id_penyewa');
            $table->text('id_kamar');
            $table->date('tgl_sewa');
            $table->text('tipe');
            $table->text('id_user');
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
        Schema::dropIfExists('tb_sewa');
    }
}
