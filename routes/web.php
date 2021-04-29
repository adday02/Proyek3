<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_perusahaanController;
use App\Http\Controllers\Admin_pelatihanController;
use App\Http\Controllers\LoginController;
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
Route::get('/', function () {
    return view('utama');
});

Route::group(['prefix'=> 'admin',  'middleware'=> 'auth:admin'], function()
{
        Route::get('dashboard', function () {
            return view('admin/dashboard');
        })->middleware('auth:admin');

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
        
        Route::resource('pelatihan',Admin_pelatihanController::class);
        
        Route::get('pengajuan', function () {
            return view('admin/pengajuan');
        });

});

Route::group(['prefix'=> 'perusahaan',  'middleware'=> 'auth:perusahaan'], function()
{
    Route::get('dashboard', function () {
        return view('perusahaan/dashboard');
    })->middleware('auth:perusahaan');

    Route::resource('lowongan',Perusahaan_lowonganController::class);
    
    Route::get('lamaran', function () {
        return view('perusahaan/lamaran');
    });
    
});

Route::group(['prefix'=> 'masyarakat',  'middleware'=> 'auth:masyarakat'], function()
{
    Route::get('homeuser', function () {
        return view('masyarakat/homeuser');
    })->middleware('auth:masyarakat');

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
Route::post('/kirimdata',[LoginController::class,'masuk'])->name('login');
Route::get('/keluar',[LoginController::class,'keluar']);




Route::get('/pertamina', function () {
    return view('detailLoker');
});

