<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['no_transaksi', 'id_penyewa', 'tgl_bayar', 'status'];

}
