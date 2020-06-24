<?php

namespace App\Http\Controllers;

use App\Sewa;
use App\Penyewa;
use App\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;




class SewaController extends Controller
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
        $title = 'Sewa';
        //$sewa =  Sewa::paginate(5);
        $sewa = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->get();
        //$sewa = DB::table('tb_sewa')->get();
        return view('admin.sewa.sewa',compact('title','sewa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = 'Input Sewa';
        $kamar   = Kamar::all();
        $penyewa = Penyewa::all();
        return view('admin.sewa.inputsewa',compact('title','kamar','penyewa'));
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
            'id_penyewa'  => 'required',
            'tgl_sewa'    => 'date',
            'tipe'        => 'required',
            'fasilitas'   => '',
            'biaya'       => '',
        ],$messages);
        
        Sewa::create($validasi);
        return redirect('sewa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function show(sewa $sewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Sewa';
        $kamar   = Kamar::all();
        $penyewa = Penyewa::all();
        $sewa = DB::table('tb_penyewa')
            ->join('tb_kamar', 'tb_penyewa.id_kamar', '=', 'tb_kamar.id_kamar')
            ->join('tb_sewa', 'tb_penyewa.id_penyewa', '=', 'tb_sewa.id_penyewa')
            ->where('tb_sewa.id_penyewa', $id)
            ->get();
        //$sewa = DB::table('tb_sewa')->where('id_sewa',$id)->get();
        //$sewa = sewa::find($id);
        return view('admin.sewa.editsewa',compact('title','kamar','penyewa','sewa'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sewa  $sewa
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
            'id_penyewa'  => 'required',
            'tgl_sewa'    => 'date',
            'tipe'        => 'required',
            'fasilitas'   => '',
            'biaya'       => '',
        ],$messages);
        
        sewa::whereid_sewa($id)->update($validasi);
        return redirect('sewa')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sewa::whereid_sewa($id)->delete();
        return redirect('sewa')->with('success', 'Data Berhasil Di Hapus');
    }
}
