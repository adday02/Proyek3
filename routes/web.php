<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_perusahaanController;
use App\Http\Controllers\login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin/dashboard');
    })->middleware('auth:admin');
    Route::resource('perusahaan',Admin_perusahaanController::class)->middleware('auth:admin');
    Route::get('masyarakat', function () {
        return view('admin/masyarakat');
    })->middleware('auth:admin');
    
    Route::get('lowongan', function () {
        return view('admin/lowongan');
    })->middleware('auth:admin');
    
    Route::get('lamaran', function () {
        return view('admin/lamaran');
    })->middleware('auth:admin');
    
    Route::get('pelatihan', function () {
        return view('admin/pelatihan');
    })->middleware('auth:admin');
    
    Route::get('pengajuan', function () {
        return view('admin/pengajuan');
    })->middleware('auth:admin');
});

Route::prefix('perusahaan')->group(function () {
    Route::get('dashboard', function () {
        return view('perusahaan/dashboard');
    })->middleware('auth:perusahaan');
    Route::get('lowongan', function () {
        return view('perusahaan/lowongan');
    })->middleware('auth:perusahaan');
    
    Route::get('lamaran', function () {
        return view('perusahaan/lamaran');
    })->middleware('auth:perusahaan');
    
});

Route::prefix('masyarakat')->group(function () {
    Route::get('homeuser', function () {
        return view('masyarakat/homeuser');
    })->middleware('auth:masyarakat');
    Route::get('lamaran', function () {
        return view('masyarakat/lamaran');
    })->middleware('auth:masyarakat');
    
    Route::get('lowongan', function () {
        return view('masyarakat/lowongan');
    })->middleware('auth:masyarakat');

    Route::get('pelatihan', function () {
        return view('masyarakat/pelatihan');
    })->middleware('auth:masyarakat');
    Route::get('daftarpelatihan', function () {
        return view('masyarakat/daftarpelatihan');
    })->middleware('auth:masyarakat');
});

Route::get('login', function () {
    return view('login');
})->middleware('guest');

Route::get('/', function () {
    return view('utama');
})->middleware('guest');;

Route::get('/pertamina', function () {
    return view('detailLoker');
});

Route::post('/kirimdata',[login::class,'masuk'])->name('login');;
Route::get('/keluar',[login::class,'keluar']);
