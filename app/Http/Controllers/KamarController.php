<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KamarController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
<<<<<<< HEAD
            if(Gate::allows('admin')) return $next($request);
=======
            if(Gate::allows('admin'))return $next($request);
>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
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
        $title = 'Kamar';
        $kamar = Kamar::paginate(5);
<<<<<<< HEAD
        return view('admin.kamar.kamar',compact('title','kamar'));
=======
        return view('admin.kamar',compact('title','kamar'));
>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Input Kamar';
<<<<<<< HEAD
        return view('admin.kamar.inputkamar',compact('title'));
=======
        return view('admin.inputkamar',compact('title'));
>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
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
            'nama_kamar' => 'required',
            'fasilitas'  => 'required',
            'status'     => '',
            'harga_sewa' => 'numeric'
        ],$messages);
        
        Kamar::create($validasi);
        return redirect('kamar')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Input Kamar';
        $kamar = Kamar::find($id);
<<<<<<< HEAD
        return view('admin.kamar.inputkamar',compact('title','kamar'));
=======
        return view('admin.inputkamar',compact('title','kamar'));
>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
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
            'nama_kamar' => 'required',
            'fasilitas'  => 'required',
            'status'     => '',
            'harga_sewa' => 'numeric'
        ],$messages);
        
        Kamar::whereid_kamar($id)->update($validasi);
        return redirect('kamar')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kamar::whereid_kamar($id)->delete();
        return redirect('kamar')->with('success', 'Data Berhasil Di Update');
    }
}
