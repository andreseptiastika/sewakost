<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['no_transaksi', 'id_sewa', 'tgl_bayar',
                            'biaya', 'jumlah_bayar', 'batas_tempo'];

    public function penyewa()
    {
    	return $this->belongsTo('App\Penyewa','id_penyewa','id_penyewa');
    }

    public function sewa()
    {
        return $this->belongsTo('App\Sewa','id_sewa','id_sewa');
    }

    public function kamar()
    {
    	return $this->belongsTo('App\Kamar','id_kamar','id_kamar');
    }
}
