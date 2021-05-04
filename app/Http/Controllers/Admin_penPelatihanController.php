<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar_Pelatihan;

class Admin_penPelatihanController extends Controller
{
    public function index()
    {
        $pengajuans = Pendaftar_Pelatihan::all();
        return view('admin/pengajuan',compact('pengajuans'))->with('i');
    }
}
