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

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin')) return $next($request);

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
        $title = 'Transaksi';
        //$transaksi = Transaksi::paginate(5);
        $transaksi = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->get();
        return view('admin.transaksi.transaksi',compact('title','transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Input Transaksi';
        $sewa    = Sewa::all();
        $kamar   = Kamar::all();
        $penyewa = Penyewa::all();
        return view('admin.transaksi.inputtransaksi',compact('title','sewa','kamar','penyewa'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus lengkap',
            'date'     => 'Kolom :attribute harus tanggal.',     
            'numeric'  => 'Kolom :attribute harus Angka.'
        ];

        $validasi = $request->validate([
            'no_transaksi'  => 'required',
            'id_penyewa'    => 'required',
            'tgl_bayar'     => 'date',
            'status'        => ' '
        ],$messages);
        
        Transaksi::create($validasi);
        return redirect('transaksi')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Bayar';
        $sewa = Sewa::all();
        $kamar   = Kamar::all();
        $penyewa = Penyewa::all();
        //$transaksi = Transaksi::find($id);

        $transaksi = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->where('tb_transaksi.id_penyewa', $id)
            ->get();
        
        return view('admin.transaksi.bayar',compact('title','transaksi','sewa','kamar','penyewa'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::table('tb_pembayaran')->insert([
        'sub_total'     => $request->sub_total,
        'cash'          => $request->cash,
        'kembalian'     => $request->cash - $request->sub_total,
        'id_penyewa'    => $id
        ]);

        DB::table('tb_transaksi')->where('id_penyewa',$id)->update([
        'status' => 'Lunas'
         ]);
        
        //Transaksi::whereid_transaksi($id)->update($validasi);
        return redirect('transaksi')->with('success', 'Pembayaran Berhasil Dilakukan');
    
/*
        $messages = [
            'required' => 'Kolom :attribute harus lengkap',
            'date'     => 'Kolom :attribute harus tanggal.',     
            'numeric'  => 'Kolom :attribute harus Angka.'
        ];

        $validasi = $request->validate([
            'sub_total'  => '',
            'cash'       => '',
            'kembalian'  => '',
            'id_penyewa' => ''
            
        ],$messages);
*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::whereid_transaksi($id)->delete();
        return redirect('transaksi')->with('success', 'Data Berhasil Di Hapus');
    }

     public function print($id)
    {
        $title = 'Print';

        $transaksi = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->join('tb_transaksi', 'tb_penyewa.id_penyewa', '=', 'tb_transaksi.id_penyewa')
            ->join('tb_pembayaran', 'tb_penyewa.id_penyewa', '=', 'tb_pembayaran.id_penyewa')
            ->where('tb_transaksi.id_penyewa', $id)
            ->get();
        
        return view('admin.transaksi.print',compact('title','transaksi'));

    }

}