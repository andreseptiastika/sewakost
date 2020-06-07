<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KepalaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
<<<<<<< HEAD
            if(Gate::allows('kepala')) return $next($request);
=======
            if(Gate::allows('kepala'))return $next($request);
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
        $title = 'Kepala';
<<<<<<< HEAD
        return view('kepala.dashboard',compact('title'));
=======
        return view('admin.dashboard',compact('title'));
>>>>>>> a0e994ae52856480ec5f4b7de76a9a3bed54bebd
    }

}
