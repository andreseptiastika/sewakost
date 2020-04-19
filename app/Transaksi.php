<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_kamar', 'id_penyewa', 'tgl_masuk', 'tgl_keluar', 
                            'tgl_bayar', 'biaya', 'jumlah_bayar', 'batas_tempo'];
}
