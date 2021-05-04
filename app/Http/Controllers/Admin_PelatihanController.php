<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;


class Admin_pelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::all();
<<<<<<< HEAD
        return view('admin/pelatihan',compact('pelatihans'))->with('i');
=======
        return view('admin.pelatihan',compact('pelatihans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
    }

    public function store(Request $request)
    {
        $data = array(
<<<<<<< HEAD
            'bidang_kejuruan'=>$request->bidang_kejuruan,
            'persyarakat'=>$request->persyarakat,
            'kuota'=>$request->kuota,
            'deskripsi'=>$request->deskripsi,
        );
        Pelatihan::create($data);
        return redirect('admin\pelatihan')->with('success','pelatihan berhasil ditambah');
=======
            'id_pelatihan'=>$request->id_pelatihan,
            'bidang_kejuruan'=>$request->bidang_kejuruan,
            'deskripsi'=>$request->deskripsi,
            'persyaratan'=>$request->persyaratan,
            'kuota'=>$request->kuota,
           
        );
        Pelatihan::create($data);
        return redirect('admin.pelatihan')->with('success','Pelatihan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'bidang_kejuruan'=>$request->bidang_kejuruan,
<<<<<<< HEAD
            'persyarakat'=>$request->persyarakat,
            'kuota'=>$request->kuota,
            'deskripsi'=>$request->deskripsi,
        );
        Pelatihan::whereid_pelatihan($id)->update($data);
        return redirect('admin\pelatihan');
=======
            'deskripsi'=>$request->deskripsi,
            'persyaratan'=>$request->persyaratan,
            'kuota'=>$request->kuota,
            
        );
    Pelatihan::whereid_pelatihan($id)->update($data);
    return redirect('admin.pelatihan');
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
    }
    public function destroy($id)
    {
        try{
            $datas = Pelatihan::findOrfail($id);
            $datas->delete();
            return redirect('admin.pelatihan')->with('success','Pelatihan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin.pelatihan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
