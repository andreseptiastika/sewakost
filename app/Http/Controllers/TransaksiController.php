<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin'))return $next($request);
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
        $transaksi = Transaksi::paginate(5);
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
        return view('admin.transaksi.inputtransaksi',compact('title'));
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
            'id_kamar'      => 'required',
            'id_penyewa'    => 'required',
            'tgl_masuk'     => 'date',
            'tgl_keluar'    => 'date',
            'tgl_bayar'     => '',
            'biaya'         => '',
            'jumlah_bayar'  => '',
            'batas_tempo'   => ''
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
        $title = 'Edit Transaksi';
        $transaksi = Transaksi::find($id);
        return view('admin.transaksi.inputtransaksi',compact('title','transaksi'));
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
        $messages = [
            'required' => 'Kolom :attribute harus lengkap',
            'date'     => 'Kolom :attribute harus tanggal.',     
            'numeric'  => 'Kolom :attribute harus Angka.'
        ];

        $validasi = $request->validate([
            'id_kamar'      => 'required',
            'id_penyewa'    => 'required',
            'tgl_masuk'     => 'date',
            'tgl_keluar'    => 'date',
            'tgl_bayar'     => '',
            'biaya'         => '',
            'jumlah_bayar'  => '',
            'batas_tempo'   => ''
        ],$messages);
        
        Transaksi::whereid_transaksi($id)->update($validasi);
        return redirect('transaksi')->with('success', 'Data Berhasil Di Update');
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
}
