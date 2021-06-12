<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use DB;

class Perusahaan_dasboardController extends Controller
{
    public function index()
    {
        $pengajuans = DB::table('lowongans')->where('status', '=', 'Dalam Pengajuan')->where('id_perusahaan', '=',auth()->user()->id_perusahaan)->count();     
        $diterimas = DB::table('lowongans')->where('status', '=', 'Diterima')->where('id_perusahaan', '=',auth()->user()->id_perusahaan)->count();     
        $ditolaks = DB::table('lowongans')->where('status', '=', 'Ditolak')->where('id_perusahaan', '=',auth()->user()->id_perusahaan)->count();     
        return view('perusahaan/dashboard',compact('diterimas','ditolaks','pengajuans'))->with('i');
    }
}
