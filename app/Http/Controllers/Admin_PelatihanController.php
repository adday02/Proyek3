<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;


class Admin_pelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::all();
        return view('admin/pelatihan',compact('pelatihans'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'bidang_kejuruan'=>$request->bidang_kejuruan,
            'persyarakat'=>$request->persyarakat,
            'kuota'=>$request->kuota,
            'deskripsi'=>$request->deskripsi,
        );
        Pelatihan::create($data);
        return redirect('admin\pelatihan')->with('success','pelatihan berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'bidang_kejuruan'=>$request->bidang_kejuruan,
            'persyarakat'=>$request->persyarakat,
            'kuota'=>$request->kuota,
            'deskripsi'=>$request->deskripsi,
        );
        Pelatihan::whereid_pelatihan($id)->update($data);
        return redirect('admin\pelatihan');
    }
    public function destroy($id)
    {
        try{
            $datas = Pelatihan::findOrfail($id);
            $datas->delete();
            return redirect('admin/pelatihan')->with('success','Pelatihan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/pelatihan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
