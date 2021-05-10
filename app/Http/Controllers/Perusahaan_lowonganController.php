<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Perusahaan;

class Perusahaan_lowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongans = Lowongan::all();
      
        return view('perusahaan/lowongan',compact('lowongans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = array(
            'id_perusahaan'=>$request->id_perusahaan,
            'jenis_kerja'=>$request->jenis_kerja,
            'deskripsi_kerja'=>$request->deskripsi_kerja,
            'lokasi_kerja'=>$request->lokasi_kerja,
            'gaji'=>$request->gaji,
            'kontak'=>$request->kontak,
            'status'=>"Dalam Pengajuan"
        );
        Lowongan::create($data);
        return redirect('perusahaan/lowongan')->with('success','Lowongan berhasil ditambah');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            
            'id_perusahaan'=>$request->id_perusahaan,
            'jenis_kerja'=>$request->jenis_kerja,
            'deskripsi_kerja'=>$request->deskripsi_kerja,
            'lokasi_kerja'=>$request->lokasi_kerja,
            'gaji'=>$request->gaji,
            'kontak'=>$request->kontak,
            
        );
    Lowongan::whereid_lowongan($id)->update($data);
    return redirect('perusahaan/lowongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $datas = Lowongan::findOrfail($id);
            $datas->delete();
            return redirect('perusahaan/lowongan')->with('success','Lowongan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('perusahaan/lowongan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
