<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\Perusahaan;
use App\Models\Lowongan;

class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihans = Pelatihan::all();
        $perusahaans = Perusahaan::all();
        $lowongans = Lowongan::all();
        return view('utama',compact('perusahaans','pelatihans','lowongans'))->with('i');
    }
}
