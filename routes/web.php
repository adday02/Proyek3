<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_perusahaanController;
use App\Http\Controllers\Admin_pelatihanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Perusahaan_lowonganController;
use App\Http\Controllers\Perusahaan_lamaranController;
use App\Http\Controllers\Perusahaan_dasboardController;
use App\Http\Controllers\Masyarakat_pendaftarPelatihanController;

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
Route::get('/', function () {
    return view('utama');
});

Route::group(['prefix'=> 'admin',  'middleware'=> 'auth:admin'], function()
{
        Route::get('dashboard', function () {
            return view('admin/dashboard');
        });

        Route::resource('perusahaan',Admin_perusahaanController::class);

        Route::resource('pelatihan',Admin_pelatihanController::class);
        
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

});


Route::group(['prefix'=> 'perusahaan',  'middleware'=> 'auth:perusahaan'], function()
{
    
    Route::resource('dashboard',Perusahaan_dasboardController::class);
    Route::resource('lowongan',Perusahaan_lowonganController::class);
    Route::resource('lamaran',Perusahaan_lamaranController::class);
    
    
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

    Route::resource('daftarpelatihan',Masyarakat_pendaftarPelatihanController::class);
    
});

Route::get('login', function () {
    return view('login');
})->middleware('guest');


Route::get('/pertamina', function () {
    return view('detailLoker');
});

Route::post('/kirimdata',[LoginController::class,'masuk'])->name('login');
Route::get('/keluar',[LoginController::class,'keluar']);
