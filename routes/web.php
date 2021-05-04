<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_dashboardController;
use App\Http\Controllers\Admin_perusahaanController;
use App\Http\Controllers\Admin_masyarakatController;
use App\Http\Controllers\Admin_lowonganController;
use App\Http\Controllers\Admin_lamaranController;
use App\Http\Controllers\Admin_pelatihanController;
use App\Http\Controllers\Admin_PenPelatihanController;
use App\Http\Controllers\UtamaController;
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


Route::group(['prefix'=> 'admin',  'middleware'=> 'auth:admin'], function()
{
        Route::resource('dashboard',Admin_dashboardController::class);
        Route::resource('perusahaan',Admin_perusahaanController::class);
        Route::resource('masyarakat',Admin_masyarakatController::class);
        Route::resource('lowongan',Admin_lowonganController::class);
        Route::resource('lamaran',Admin_lamaranController::class);
        Route::resource('pelatihan',Admin_pelatihanController::class);
        Route::resource('pengajuan',Admin_penPelatihanController::class);
});

Route::group(['prefix'=> 'perusahaan',  'middleware'=> 'auth:perusahaan'], function()
{
    Route::get('dashboard', function () {
        return view('perusahaan/dashboard');
    });
    Route::get('lowongan', function () {
        return view('perusahaan/lowongan');
    });
    
    Route::get('lamaran', function () {
        return view('perusahaan/lamaran');
    });
    
});

Route::group(['prefix'=> 'masyarakat',  'middleware'=> 'auth:masyarakat'], function()
{
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
})->middleware('guest');

Route::resource('/',UtamaController::class);

Route::get('/pertamina', function () {
    return view('detailLoker');
});

Route::post('/kirimdata',[login::class,'masuk'])->name('login');;
Route::get('/keluar',[login::class,'keluar']);
