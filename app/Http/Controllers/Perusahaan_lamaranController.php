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

    public function update(Request $request, $id)
    {
        $data = array(
            'status'=>$request->status,          
        );
        Lamaran::whereid_lamaran($id)->update($data);
        return redirect('perusahaan/lamaran-perusahaan');
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
            return redirect('perusahaan/lamaran-perusahaan')->with('success','Lamaran Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('perusahaan/lamaran-perusahaan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
