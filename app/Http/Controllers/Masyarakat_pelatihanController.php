<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;

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
        return view('masyarakat/pelatihan',compact('pelatihans'))->with('i');
    }
}
