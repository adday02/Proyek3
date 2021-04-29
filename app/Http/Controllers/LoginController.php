<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Admin;
use App\models\Perusahaan;
use App\models\Masyarakat;
use Auth;

class LoginController extends Controller
{
    function masuk(Request $kiriman)
    {
        $data1=Admin::where('username',$kiriman->username)->where('password',$kiriman->password)->get();
        $data2=Perusahaan::where('id_perusahaan',$kiriman->username)->where('password',$kiriman->password)->get();
        $data3=Masyarakat::where('nik',$kiriman->username)->where('password',$kiriman->password)->get();

        if (count($data1)>0) {
    		Auth::guard('admin')->LoginUsingId($data1[0]['username']);
    		return redirect('/admin/dashboard');
    	}
    	else if (count($data2)>0) {
    		Auth::guard('perusahaan')->LoginUsingId($data2[0]['id_perusahaan']);
            return redirect('/perusahaan/dashboard');
    	}
    	else if (count($data3)>0) {
    		Auth::guard('masyarakat')->LoginUsingId($data3[0]['nik']);
    		return redirect('/masyarakat/homeuser');
    	}
    	else{
    		return redirect('/login')->with('Login Gagal');
    	}
    }

    function keluar()
    {
        if (Auth::guard('admin')->check()) {
    		Auth::guard('admin')->logout();
    	}else if (Auth::guard('perusahaan')->check()) {
    		Auth::guard('perusahaan')->logout();
		}else if (Auth::guard('masyarakat')->check()) {
    		Auth::guard('masyarakat')->logout();
        }
		return redirect('/login');
    }
}