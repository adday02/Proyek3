<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Validator;

class Masyarakat_profilController extends Controller
{
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'foto' => 'image:jpeg,jpg,png'
        ], [
            'foto.image'            => 'Foto tidak valid.',
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
                'nama'=>$request->nama,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
            );
        Masyarakat::wherenik($id)->update($data);
        return redirect('masyarakat\lowongan-masyarakat');
    }
}
