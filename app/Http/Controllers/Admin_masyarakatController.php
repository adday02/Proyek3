<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class Admin_masyarakatController extends Controller
{
    public function index()
    {
        $masyarakats = Masyarakat::all();
        return view('admin/masyarakat',compact('masyarakats'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'foto' => 'required|image:jpeg,jpg,png'
        ], [
            'foto.required'         => 'foto wajib diisi.',
            'foto.image'            => 'foto tidak valid.',
        ]);

        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'nik'=>$request->nik,
            'password'=>bcrypt($request->password),
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'no_hp'=>$request->no_hp,
            'pendidikan_terakhir'=>$request->pendidikan_terakhir,
            'alamat'=>$request->alamat,
            'foto'=>$new_name,
            'status'=>"Diterima"
        );
        Masyarakat::create($data);
        return redirect('admin\masyarakat')->with('success','masyarakat berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'foto' => 'required|image:jpeg,jpg,png'
        ], [
            'foto.required'         => 'foto wajib diisi.',
            'foto.image'            => 'foto tidak valid.',
        ]);

        $foto = $request->file('foto');
        if($request->hasFile('foto'))
        {
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $new_name);
            $data = array(            
                'foto'=>$new_name,
            );
        Masayarkat::wherenik($id)->update($data);
        }

        if($request->has('jk'))
        {
            $data = array(
                'jk'=>$request->jk,
            );
        Masyarakat::wherenik($id)->update($data);
        }
        if($request->has('pendidikan_terakhir'))
        {
            $data = array(
                'pendidikan_terakhir'=>$request->pendidikan_terakhir,
            );
        Masyarakat::wherenik($id)->update($data);
        }
        if($request->has('status'))
        {
            $data = array(
                'status'=>$request->status,
            );
        Masyarakat::wherenik($id)->update($data);
        }
            $data = array(
                'password'=>bcrypt($request->password),
                'nama'=>$request->nama,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
            );
        Masyarakat::wherenik($id)->update($data);
        return redirect('admin\masyarakat');
    }

    public function destroy($id)
    {
        try{
            $datas = Masyarakat::findOrfail($id);
            $datas->delete();
            return redirect('admin\masyarakat')->with('success','masyarakat Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\masyarakat')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
