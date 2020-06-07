<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    
    protected $table='tb_sewa';
    protected $primaryKey = 'id_sewa';
    protected $fillable = ['id_penyewa', 'id_kamar', 'tgl_sewa', 'tipe', 'id_user'];

    public function kamar()
    {
    	return $this->belongsTo('App\Kamar','id_kamar','id_kamar');
    }

    public function penyewa()
    {
    	return $this->belongsTo('App\Penyewa','id_penyewa','id_penyewa');
    }

    public function transaksi()
    {
    	return $this->belongsTo('App\Transaksi','id_sewa','id_sewa');
    }

}
  