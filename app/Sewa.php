<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    
    protected $table='tb_sewa';
    protected $fillable = ['id_penyewa', 'tgl_sewa', 'tipe', 'fasilitas', 'biaya'];

    public function penyewa()
    {
    	return $this->belongsTo('App\Penyewa','id_penyewa','id_penyewa');
    }

    public function kamar()
    {
    	return $this->belongsTo('App\Kamar','id_kamar','id_kamar');
    }

}
  