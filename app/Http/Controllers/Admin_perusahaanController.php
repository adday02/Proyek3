<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Validator;
use App\Http\Requests\CreateAdminPerusahaanRequest;
use Illuminate\Support\Facades\Crypt;

class Admin_perusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaans = Perusahaan::all();
        return view('admin/perusahaan',compact('perusahaans'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'logo' => 'required|image:jpeg,jpg,png'
        ], [
            'logo.required'         => 'Logo wajib diisi.',
            'logo.image'            => 'Logo tidak valid.',
        ]);
        $logo = $request->file('logo');
        $new_name = rand().'.'.$logo->getClientOriginalExtension();
        $logo->move(public_path('logo'), $new_name);

        $data = array(
            'id_perusahaan'=>$request->id_perusahaan,
            'password'=>Crypt::encryptString($request->password),
            'nama'=>$request->nama,
            'logo'=>$new_name,
            'email'=>$request->email,
            'website'=>$request->website,
            'alamat'=>$request->alamat,
            'deskripsi'=>$request->deskripsi
        );
        Perusahaan::create($data);
        return redirect('admin\perusahaan')->with('success','Perusahaan berhasil ditambah');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            
            'logo' => 'required|image:jpeg,jpg,png'
        ], [
            'logo.required'         => 'Logo wajib diisi.',
            'logo.image'            => 'Logo tidak valid.',
        ]);
        
        $logo = $request->file('logo');
        if($request->hasFile('logo'))
        {
            $new_name = rand().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('logo'), $new_name);
            $data = array(            
                'logo'=>$new_name,
            );
        Perusahaan::whereid_perusahaan($id)->update($data);
        }
            $data = array(
                'nama'=>$request->nama,
                'email'=>$request->email,
                'website'=>$request->website,
                'alamat'=>$request->alamat,
                'deskripsi'=>$request->deskripsi
            );
        Perusahaan::whereid_perusahaan($id)->update($data);
        return redirect('admin\perusahaan');
    }
    public function destroy($id)
    {
        try{
            $datas = Perusahaan::findOrfail($id);
            $datas->delete();
            return redirect('admin\perusahaan')->with('success','Perusahaan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\perusahaan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}
