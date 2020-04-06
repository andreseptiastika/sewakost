<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table='kamar';
    protected $primaryKey = 'id_kamar';
    protected $fillable = ['nama_kamar', 'fasilitas', 'status', 'harga_sewa'];
}
