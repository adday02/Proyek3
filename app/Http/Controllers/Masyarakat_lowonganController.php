<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Lamaran;

class Masyarakat_lowonganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongans=Lowongan::where('status','Diterima')->get();
        $lamarans = Lamaran::all();
        return view('masyarakat/lowongan',compact('lowongans','lamarans'))->with('i');
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
        $new_name = rand().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('file'), $new_name);

        $data = array(
            'id_lowongan'=>$request->id_lowongan,
            'nik'=>$request->nik,
            'file'=>$new_name,
            'status'=>'Dalam Proses',
        );
        Lamaran::create($data);
        return redirect('masyarakat\lamaran-masyarakat')->with('success','lamaran berhasil ditambah');
    }
}
