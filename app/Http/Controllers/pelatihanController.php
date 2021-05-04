<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;

class pelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihans = Pelatihan::all();
        return view('admin/pelatihan',compact('pelatihans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'id_pelatihan'=>$request->id_pelatihan,
            'bidang_kejuruan'=>$request->bidang_kejuruan,
            'deskripsi'=>$request->deskripsi,
            'persyaratan'=>$request->persyaratan,
            'kuota'=>$request->kuota,
           
        );
        Pelatihan::create($data);
        return redirect('admin/pelatihan')->with('success','Pelatihan berhasil ditambah');
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
            'bidang_kejuruan'=>$request->bidang_kejuruan,
            'deskripsi'=>$request->deskripsi,
            'persyaratan'=>$request->persyaratan,
            'kuota'=>$request->kuota,
            
        );
    Pelatihan::whereid_pelatihan($id)->update($data);
    return redirect('admin/pelatihan');
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
            $datas = Pelatihan::findOrfail($id);
            $datas->delete();
            return redirect('admin/pelatihan')->with('success','Pelatihan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/pelatihan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
