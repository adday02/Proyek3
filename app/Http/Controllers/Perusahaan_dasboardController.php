<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Lowongan;
use App\Models\Lamaran;

class Perusahaan_dasboardController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::count();
        $lamaran = Lamaran::count();
      
       
        return view('perusahaan/dashboard',compact('lowongan','lamaran'))->with('i');
    }
}
