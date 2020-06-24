<?php

namespace App\Http\Controllers;

use App\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AkunController extends Controller
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
        $title = 'Akun';
        $akun = Akun::paginate(5);
        return view('admin.akun.akun',compact('title','akun'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Input Akun';
        return view('admin.akun.inputakun',compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::table('users')->insert([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'roles'    => $request->roles
        ]);

        return redirect('akun')->with('success', 'Data Berhasil Di Disimpan');
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
        $title = 'Edit Akun';
        $akun = Akun::find($id);
        return view('admin.akun.inputakun',compact('title','akun'));

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
        DB::table('users')
              ->where('id', $id)
              ->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'roles'    => $request->roles
            ]);

        return redirect('akun')->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Akun::whereid($id)->delete();
        return redirect('akun')->with('success', 'Data Berhasil Di Hapus');
    }
}
