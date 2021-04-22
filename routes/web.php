<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_perusahaanController;
use App\Http\Controllers\pelatihanController;
use App\Http\Controllers\Perusahaan_lowonganController;


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
    });
    
    Route::resource('perusahaan',Admin_perusahaanController::class);
  

    Route::get('masyarakat', function () {
        return view('admin/masyarakat');
    });
    
    Route::get('lowongan', function () {
        return view('admin/lowongan');
    });
    
    Route::get('lamaran', function () {
        return view('admin/lamaran');
    });
    
    
    
    Route::get('pengajuan', function () {
        return view('admin/pengajuan');
    });

    Route::resource('pelatihan',pelatihanController::class);
});

Route::prefix('perusahaan')->group(function () {
    Route::get('dashboard', function () {
        return view('perusahaan/dashboard');
    });

    Route::resource('lowongan',Perusahaan_lowonganController::class);
    
    Route::get('lamaran', function () {
        return view('perusahaan/lamaran');
    });
    
});

Route::prefix('masyarakat')->group(function () {
    Route::get('homeuser', function () {
        return view('masyarakat/homeuser');
    });
    Route::get('lamaran', function () {
        return view('masyarakat/lamaran');
    });
    
    Route::get('lowongan', function () {
        return view('masyarakat/lowongan');
    });

    Route::get('pelatihan', function () {
        return view('masyarakat/pelatihan');
    });
    Route::get('daftarpelatihan', function () {
        return view('masyarakat/daftarpelatihan');
    });
});

Route::get('login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('utama');
});

Route::get('/pertamina', function () {
    return view('detailLoker');
});
