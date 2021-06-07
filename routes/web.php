<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_dashboardController;
use App\Http\Controllers\AddAdmin;
use App\Http\Controllers\Admin_perusahaanController;
use App\Http\Controllers\Admin_masyarakatController;
use App\Http\Controllers\Admin_lowonganController;
use App\Http\Controllers\Admin_lamaranController;
use App\Http\Controllers\Admin_pelatihanController;
use App\Http\Controllers\Admin_PenPelatihanController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Perusahaan_dasboardController;
use App\Http\Controllers\Perusahaan_lowonganController;
use App\Http\Controllers\Perusahaan_lamaranController;
use App\Http\Controllers\Masyarakat_pendaftarPelatihanController;
use App\Http\Controllers\Masyarakat_lamaranController;
use App\Http\Controllers\Masyarakat_lowonganController;
use App\Http\Controllers\Masyarakat_pelatihanController;
use App\Http\Controllers\Masyarakat_pendaftranPelatihanController;
use App\Http\Controllers\Masyarakat_profilController;
use App\Http\Controllers\DaftarController;

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

Route::resource('/',UtamaController::class);
Route::resource('daftar',DaftarController::class);
Route::resource('kontak',KontakController::class);

Route::group(['prefix'=> 'admin',  'middleware'=> 'auth:admin'], function()
{
    Route::resource('dashboard',Admin_dashboardController::class);
    Route::resource('perusahaan',Admin_perusahaanController::class);
    Route::resource('masyarakat',Admin_masyarakatController::class);
    Route::resource('lowongan',Admin_lowonganController::class);
    Route::resource('lamaran',Admin_lamaranController::class);
    Route::resource('pelatihan',Admin_pelatihanController::class);
    Route::resource('pengajuan',Admin_penPelatihanController::class);
    Route::resource('kontak',KontakController::class);
});

Route::group(['prefix'=> 'perusahaan',  'middleware'=> 'auth:perusahaan'], function()
{
    Route::resource('dashboard',Perusahaan_dasboardController::class);    
    Route::resource('lowongan-Perusahaan',Perusahaan_lowonganController::class);    
    Route::resource('lamaran-perusahaan',Perusahaan_lamaranController::class);    
});

Route::group(['prefix'=> 'masyarakat',  'middleware'=> 'auth:masyarakat'], function()
{
    Route::resource('lamaran-masyarakat',Masyarakat_lamaranController::class);
    Route::resource('lowongan-masyarakat',Masyarakat_lowonganController::class);
    Route::resource('pelatihan-masyarakat',Masyarakat_pelatihanController::class);
    Route::resource('daftarpelatihan-masyarakat',Masyarakat_pendaftarPelatihanController::class);
    Route::resource('profile-masyarakat',Masyarakat_profilController::class);
});

Route::post('/kirimdata',[LoginController::class,'masuk'])->name('login');
Route::get('/keluar',[LoginController::class,'keluar']);

Route::get('login', function () {
    return view('login');
})->middleware('guest');



Route::resource('tambah',AddAdmin::class);