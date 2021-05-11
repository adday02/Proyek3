<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar_Pelatihan;

class Admin_penPelatihanController extends Controller
{
    public function index()
    {
        $pengajuans = Pendaftar_Pelatihan::all();
        return view('admin/pengajuan',compact('pengajuans'))->with('i');
    }

    public function update(Request $request, $id)
    {
        if($request->has('status'))
        {
            $data = array(
                'status'=>$request->status,
            );
        Pendaftar_Pelatihan::whereid_pen_pelatihan($id)->update($data);
        return redirect('admin\pengajuan');
        }
        return redirect('admin\pengajuan');
    }

    public function destroy($id)
    {
        try{
            $datas = Pendaftar_Pelatihan::findOrfail($id);
            $datas->delete();
            return redirect('admin\Pengajuan')->with('success','Pengajuan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\Pengajuan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
