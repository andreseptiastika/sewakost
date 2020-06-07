<?php

namespace App\Http\Controllers;

use App\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    	$penyewa = Penyewa::all();
 
    	$pdf = PDF::loadview('kepala.laporanpenyewa_pdf',compact('penyewa'));
    	return $pdf->download('kepala.laporan-penyewa-pdf');
    }
}
