<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\Pendaftar_Pelatihan;

class Masyarakat_pelatihanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihans = Pelatihan::all();
        $pendaftar_pelatihans = Pendaftar_Pelatihan::all();
        return view('masyarakat/pelatihan',compact('pelatihans','pendaftar_pelatihans'))->with('i');
    }
}
