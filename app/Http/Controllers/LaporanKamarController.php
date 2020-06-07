<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use PDF;

class LaporanKamarController extends Controller
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
        $title = 'Laporan Kamar';
    	$kamar = Kamar::all();
    	return view('kepala.laporankamar',compact('title', 'kamar'));
    }
 
    public function cetak_pdf()
    {
    	$kamar = Kamar::all();
 
    	$pdf = PDF::loadview('kepala.laporankamar_pdf',compact('kamar'));
    	return $pdf->download('kepala.laporan-kamar-pdf');
    }
}
