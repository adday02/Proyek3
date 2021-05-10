<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;
use App\Models\Masyarakat;
use App\Models\Lowongan;

class Perusahaan_lamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lamarans = Lamaran::all();
        return view('perusahaan/lamaran',compact('lamarans'))->with('i');
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
        //
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
            
            'status'=>$request->status,
            
            
            
          
           
        );
        Lamaran::whereid_lamaran($id)->update($data);
    return redirect('perusahaan/lamaran');
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
            $datas = Lamaran::findOrfail($id);
            $datas->delete();
            return redirect('perusahaan/lamaran')->with('success','Lamaran Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('perusahaan/lamaran')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
