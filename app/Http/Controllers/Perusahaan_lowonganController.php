<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Perusahaan;

class Perusahaan_lowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('perusahaan/lowongan',compact('lowongans'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'id_perusahaan'=>$request->id_perusahaan,
            'nama'=>$request->nama,
            'jenis_kerja'=>$request->jenis_kerja,
            'deskripsi_kerja'=>$request->deskripsi_kerja,
            'lokasi_kerja'=>$request->lokasi_kerja,
            'gaji'=>$request->gaji,
            'kontak'=>$request->kontak,
            'status'=>"Dalam Pengajuan"
        );
        Lowongan::create($data);
        return redirect('perusahaan/lowongan-Perusahaan')->with('success','Lowongan berhasil ditambah');
    }

    public function update(Request $request, $id)
    {

        if($request->has('jenis_kerja'))
        {
            $data = array(
                'jenis_kerja'=>$request->jenis_kerja,
            );
        Lowongan::whereid_lowongan($id)->update($data);
        }
        $data = array(
            'nama'=>$request->nama,
            'deskripsi_kerja'=>$request->deskripsi_kerja,
            'lokasi_kerja'=>$request->lokasi_kerja,
            'gaji'=>$request->gaji,
            'kontak'=>$request->kontak,
        );
        Lowongan::whereid_lowongan($id)->update($data);
    return redirect('perusahaan/lowongan-Perusahaan ');
    }

    public function destroy($id)
    {
        try{
            $datas = Lowongan::findOrfail($id);
            $datas->delete();
            return redirect('perusahaan/lowongan-Perusahaan')->with('success','Lowongan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('perusahaan/lowongan-Perusahaan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
