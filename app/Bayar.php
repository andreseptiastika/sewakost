<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table='tb_pembayaran';
    protected $fillable = ['sub_total', 'cash', 'kembalian', 'id_penyewa'];
}
