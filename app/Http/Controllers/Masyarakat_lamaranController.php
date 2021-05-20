<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;
use App\Models\Lowongan;

class Masyarakat_lamaranController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lamarans = Lamaran::all();
        $lowongans = Lowongan::all();
        return view('masyarakat/Lamaran',compact('lamarans','lowongans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file'             => 'required|mimetypes:application/pdf|max:10000',
        ],
        [
            'file.mimetypes'       => 'Upload file dengan format pdf !',
        ]);
        $file = $request->file('file');
        $new_name = rand().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('file'), $new_name);

        $data = array(
            'id_lowongan'=>$request->id_lowongan,
            'nik'=>$request->nik,
            'file'=>$new_name,
            'status'=>'dalam_proses',
        );
        Lamaran::create($data);
        return redirect('masyarakat\lamaran-masyarakat')->with('success','lamaran berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'file'             => 'required|mimetypes:application/pdf|max:10000',
        ],
        [
            'file.mimetypes'       => 'Upload file dengan format pdf !',
        ]);
        $file = $request->file('file');
        if($request->hasFile('file'))
        {
            $new_name = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('file'), $new_name);
            $data = array(            
                'file'=>$new_name,
            );
        Lamaran::whereid_lamaran($id)->update($data);
        }
            $data = array(
                'file'=>$new_name,
            );
        Lamaran::whereid_lamaran($id)->update($data);
        return redirect('masyarakat\lamaran-masyarakat');
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
            return redirect('masyarakat\lamaran-masyarakat')->with('success','lamaran Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('masyarakat\lamaran-masyarakat')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
