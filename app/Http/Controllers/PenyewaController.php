<?php

namespace App\Http\Controllers;

use App\Penyewa;
use App\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PenyewaController extends Controller
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
        $title = 'Penyewa';
        $penyewa = Penyewa::paginate(5);
        return view('admin.penyewa.penyewa',compact('title','penyewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Input Penyewa';
        $kamar   = Kamar::where('status','Kosong')->get();
        return view('admin.penyewa.inputpenyewa',compact('title', 'kamar'));
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
            'nama'           => 'required',
            'no_identitas'   => 'numeric',
            'jenis_identitas'=> 'required',
            'telp'           => 'numeric',
            'alamat'         => 'required',
            'biaya'          => 'numeric',
            'id_kamar'       => 'numeric',
            
        ],$messages);
        Kamar::whereid_kamar($request->id_kamar)->update(['status' => 'Terisi']);
        Penyewa::create($validasi);
        return redirect('penyewa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewa $penyewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Penyewa';
        $penyewa = Penyewa::find($id);
        $kamar   = Kamar::where('status','Kosong')->get();
        return view('admin.penyewa.inputpenyewa',compact('title','penyewa','kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyewa  $penyewa
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
            'nama'           => 'required',
            'no_identitas'   => 'numeric',
            'jenis_identitas'=> 'required',
            'telp'           => 'numeric',
            'alamat'         => 'required',
            'biaya'          => 'numeric',
        ],$messages);
        
        Penyewa::whereid_penyewa($id)->update($validasi);
        return redirect('penyewa')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penyewa::whereid_penyewa($id)->delete();
        return redirect('penyewa')->with('success', 'Data Berhasil Di Hapus');
    }
}
