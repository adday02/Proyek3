<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Masyarakat;
use App\Models\Lowongan;
use App\Models\Lamaran;
use App\Models\Pelatihan;
use App\Models\Pendaftar_Pelatihan;
use DB;



class Admin_dashboardController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::count();
        $masyarakats = Masyarakat::count();
        $lowongans = Lowongan::count();
        $lamarans = Lamaran::count();
        $pelatihans = Pelatihan::count();
        $pen_pelatihans = Pendaftar_Pelatihan::count();
        $semuaperusahaan = Perusahaan::all();
        $semualowongan = Lowongan::all();
        $diterimas = DB::table('lamarans')->where('status', '=', 'Diterima')->count();
        $ditolaks = DB::table('lamarans')->where('status', '=', 'Ditolak')->count();
        $dalams = DB::table('lamarans')->where('status', '!=', 'Diterima')->where('status', '!=', 'Ditolak')->count();

        return view('admin/dashboard',compact('semualowongan','semuaperusahaan','perusahaans','masyarakats','lowongans','lamarans','pelatihans','pen_pelatihans','diterimas','ditolaks','dalams'))->with('i');
    }
}
