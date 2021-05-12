<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class Masyarakat_lowonganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('masyarakat/lowongan',compact('lowongans'))->with('i');
    }
}
