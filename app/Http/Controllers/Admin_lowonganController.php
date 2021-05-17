<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;

class Admin_lowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('admin/lowongan',compact('lowongans'))->with('i');
    }

    public function update(Request $request, $id)
    {
        if($request->has('status'))
        {
            $data = array(
                'status'=>$request->status,
            );
        Lowongan::whereid_lowongan($id)->update($data);
        return redirect('admin\lowongan');
        }
<<<<<<< HEAD
        return redirect('admin\lowongan');
=======
>>>>>>> f415f2af1f83b34f735c4e20ca44e0dc1533dc79
    }


    public function destroy($id)
    {
        try{
            $datas = Lowongan::findOrfail($id);
            $datas->delete();
            return redirect('admin\lowongan')->with('success','lowongan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\lowongan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

