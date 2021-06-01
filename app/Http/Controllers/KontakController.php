<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all();
        return view('admin/kontak',compact('kontaks'))->with('i');
    }
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
