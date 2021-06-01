<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function store(Request $request)
    {
        $data = array(
            'nama'=>$request->nama,
            'email'=>$request->email,
            'tujuan'=>$request->tujuan,
            'pesan'=>$request->pesan,
        );
        Kontak::create($data);
        return redirect('/')->with('success','Kontak berhasil ditambah');
    }
}
