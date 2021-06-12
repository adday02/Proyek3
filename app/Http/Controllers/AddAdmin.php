<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;

class AddAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {
        $data = array(
            'username'=>"Admin",
            'password'=>Crypt::encryptString("Admin"),
        );
        Admin::create($data);
        return redirect('/');
    }
}
