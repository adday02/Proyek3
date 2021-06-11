<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Perusahaan;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;

class LoginController extends Controller
{
    function masuk(Request $kiriman)
    {
		
		$y=Masyarakat::All();
		$pw="False";
		foreach ($y as $p) {
			$decrypted = Crypt::decryptString($p->password);
			if($decrypted==$kiriman->password)
			{
				$pw=$p->password;
			}		
		}
		$y=Perusahaan::All();
		foreach ($y as $p) {
			$decrypted = Crypt::decryptString($p->password);
			if($decrypted==$kiriman->password)
			{
				$pw=$p->password;
			}		
		}
		$y=Admin::All();
		foreach ($y as $p) {
			$decrypted = Crypt::decryptString($p->password);
			if($decrypted==$kiriman->password)
			{
				$pw=$p->password;
			}		
		}
        $data1=Admin::where('username',$kiriman->username)->where('password',$pw)->get();
        $data2=Perusahaan::where('id_perusahaan',$kiriman->username)->where('password',$pw)->get();
        $data3=Masyarakat::where('nik',$kiriman->username)->where('password',$pw)->get();

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
    		return redirect('/masyarakat/lowongan-masyarakat');
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