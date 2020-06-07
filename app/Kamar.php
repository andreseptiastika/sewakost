<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
<<<<<<< HEAD
    protected $table='tb_kamar';
=======
    protected $table='kamar';
>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
    protected $primaryKey = 'id_kamar';
    protected $fillable = ['nama_kamar', 'fasilitas', 'status', 'harga_sewa'];
}
