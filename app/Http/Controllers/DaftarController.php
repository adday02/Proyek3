<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{

    public function index()
    {
        return view('daftar');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            
            
            'nik'          => 'required|unique:masyarakats|',
            'foto'          => 'required|image:jpeg,jpg,png'
        ], [
           
            'nik.required'           => 'Nik Harus di isi',
            'nik.unique'           => 'Nik sudah terdaftar',
            'foto.required'         => 'foto wajib diisi.',
            'foto.image'            => 'foto tidak valid.'
        ]);

        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'nik'=>$request->nik,
            'password'=>bcrypt($request->password),
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'no_hp'=>$request->no_hp,
            'pendidikan_terakhir'=>$request->pendidikan_terakhir,
            'alamat'=>$request->alamat,
            'foto'=>$new_name,
            'status'=>"Dalam Proses"
        );
        Masyarakat::create($data);
        return redirect('/login')->with('success','masyarakat berhasil ditambah');
    }
}
