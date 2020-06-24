<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table='tb_penyewa';
    protected $primaryKey = 'id_penyewa';
    protected $fillable = ['nama', 'no_identitas', 'jenis_identitas', 'telp', 'alamat', 'id_kamar'];

    public function kamar()
    {
    	return $this->belongsTo('App\Kamar','id_kamar','id_kamar');
    }
}

