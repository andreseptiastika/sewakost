<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\Penyewa;
use App\Sewa;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KepalaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('kepala'))return $next($request);
            abort(403, "Anda Tidak Memiliki Cukup Hak Akses");
        });
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $kamar   = Kamar::count();
        $penyewa = Penyewa::count();
        $sewa    = Sewa::count();
        $transaksi = Transaksi::count();
        return view('kepala.dashboard',compact('title','kamar','penyewa','sewa', 'transaksi'));

    }

}
