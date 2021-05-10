<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar_Pelatihan;
use App\Models\Pelatihan;

class Masyarakat_pendaftarPelatihanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendaftar_pelatihans = Pendaftar_Pelatihan::all();
        $pelatihans = Pelatihan::all();
        return view('masyarakat/daftarpelatihan',compact('pendaftar_pelatihans','pelatihans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $new_name = rand().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('file'), $new_name);

        $data = array(
            'nik'=>$request->nik,
            'id_pelatihan'=>$request->id_pelatihan,
            'file'=>$new_name,
            'status'=>'dalam proses',
        );
        Pendaftar_Pelatihan::create($data);
        return redirect('masyarakat\daftarpelatihan')->with('success','masyarakat berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $file = $request->file('file');
        if($request->hasFile('file'))
        {
            $new_name = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('file'), $new_name);
            $data = array(            
                'file'=>$new_name,
            );
        Pendaftar_Pelatihan::whereid_pen_pelatihan($id)->update($data);
        }
            $data = array(
                'file'=>$new_name,
   
            );
        
        Pendaftar_Pelatihan::whereid_pen_pelatihan($id)->update($data);
        return redirect('masyarakat\daftarpelatihan');
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
            $datas = Pendaftar_Pelatihan::findOrfail($id);
            $datas->delete();
            return redirect('masyarakat\daftarpelatihan')->with('success','daftarpelatihan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('masyarakat\daftarpelatihan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
