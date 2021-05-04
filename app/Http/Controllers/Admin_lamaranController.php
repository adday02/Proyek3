<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;

class Admin_lamaranController extends Controller
{
    public function index()
    {
        $lamarans = Lamaran::all();
        return view('admin/lamaran',compact('lamarans'))->with('i');
    }
}
