<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Validator;
use App\Http\Requests\CreateAdminPerusahaanRequest;

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

    $validatedData['logo'] = ($validatedData['logo']);
        $logo = $request->file('logo');
        $new_name = rand().'.'.$logo->getClientOriginalExtension();
        $logo->move(public_path('logo'), $new_name);

        $data = array(
            'id_perusahaan'=>$request->id_perusahaan,
            'password'=>$request->password,
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


    /*public function store2(Request $request)
    {
        $rules = [
            'logo'     => 'required|image:jpeg,jpg,png'
        ];
 
        $messages = [
           
            'logo.required'         => 'Logo wajib diisi.',
            'logo.image'            => 'Logo tidak valid.',
            
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
         
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
 
        $data = array(
            'id_perusahaan'=>$request->id_perusahaan,
            'password'=>$request->password,
            'nama'=>$request->nama,
            'logo'=>$new_name,
            'email'=>$request->email,
            'website'=>$request->website,
            'alamat'=>$request->alamat,
            'deskripsi'=>$request->deskripsi
        );
        $data->save();
       
        return back()->with('success', 'Perusahaan created successfully.');
    }

    public function store3(CreateAdminPerusahaanRequest $request)
    {
        $data = array(
            'id_perusahaan'=>$request->id_perusahaan,
            'password'=>$request->password,
            'nama'=>$request->nama,
            'logo'=>$new_name,
            'email'=>$request->email,
            'website'=>$request->website,
            'alamat'=>$request->alamat,
            'deskripsi'=>$request->deskripsi
        );
        $data->save();
       
        return back()->with('success', 'Perusahaan created successfully.');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
