<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Sewa;
use App\Penyewa;
use App\Kamar;
use App\Bayar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use PDF;

class LaporanPenyewaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('kepala')) return $next($request);
            abort(403, "Anda Tidak Memiliki Cukup Hak Akses");
        });
    }

    public function index()
    {
        $title = 'Laporan Penyewa';
    	$penyewa = Penyewa::all();
    	return view('kepala.laporanpenyewa',compact('title', 'penyewa'));
    }
 
    public function cetak_pdf()
    {

        $title = 'Laporan Penyewa';
        $penyewa = Penyewa::all();
        return view('kepala.laporanpenyewa_pdf',compact('title', 'penyewa'));

    }

    public function tagihan()
    {
        $title   = 'Laporan Tagihan';
        $tagihan = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->join('tb_pembayaran', 'tb_penyewa.id_penyewa', '=', 'tb_pembayaran.id_penyewa')
            ->get();


        $subtotal = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->join('tb_pembayaran', 'tb_penyewa.id_penyewa', '=', 'tb_pembayaran.id_penyewa')
            ->sum ('tb_pembayaran.sub_total');

        return view('kepala.laporantagihan',compact('title', 'tagihan', 'subtotal'));

        
    }
 
    public function cetak_tagihan()
    {

           $title   = 'Laporan Tagihan';
        $tagihan = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->join('tb_pembayaran', 'tb_penyewa.id_penyewa', '=', 'tb_pembayaran.id_penyewa')
            ->get();


        $subtotal = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->join('tb_pembayaran', 'tb_penyewa.id_penyewa', '=', 'tb_pembayaran.id_penyewa')
            ->sum ('tb_pembayaran.sub_total');

        return view('kepala.laporantagihan_pdf',compact('title', 'tagihan', 'subtotal'));

    }

   
}
