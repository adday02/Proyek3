<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Masyarakat;
use App\Models\Lowongan;
use App\Models\Lamaran;
use App\Models\Pelatihan;
use App\Models\Pendaftar_Pelatihan;

class Perusahaan_dasboardController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::count();
        $masyarakats = Masyarakat::count();
        $lowongans = Lowongan::count();
        $lamarans = Lamaran::count();
        $pelatihans = Pelatihan::count();
        $pen_pelatihans = Pendaftar_Pelatihan::count();
        $semualamaran = Lamaran::all();
        $semualowongan = Lowongan::all();
       
        return view('perusahaan/dashboard',compact('semualowongan','semualamaran','perusahaans','masyarakats','lowongans','lamarans','pelatihans','pen_pelatihans'))->with('i');
    }
}
