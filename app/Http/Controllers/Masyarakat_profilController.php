<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class Masyarakat_profilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat/profil',compact('masyarakats'))->with('i');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $foto = $request->file('foto');
        if($request->hasFile('foto'))
        {
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $new_name);
            $data = array(            
                'foto'=>$new_name,
            );
        Pegawai::wherenip($id)->update($data);
        }
            $data = array(
                'password'=>$request->password,
                'nama'=>$request->nama,
                'no_hp'=>$request->no_hp,
                'pendidikan_terakhir'=>$request->pendidikan_terakhir,
                'alamat'=>$request->alamat,
                'foto'=>$request->foto,
            );
        Masyarakat::wherenik($id)->update($data);
        return redirect('masyarakat\profil');
    }
}
