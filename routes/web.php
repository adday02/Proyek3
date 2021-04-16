<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('perusahaan', function () {
        return view('admin/perusahaan');
    });
    Route::get('masyarakat', function () {
        return view('admin/masyarakat');
    });
    
    Route::get('lowongan', function () {
        return view('admin/lowongan');
    });
    
    Route::get('lamaran', function () {
        return view('admin/lamaran');
    });
    
    Route::get('pelatihan', function () {
        return view('admin/pelatihan');
    });
    
    Route::get('pengajuan', function () {
        return view('admin/pengajuan');
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
