<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_dashboardController;
use App\Http\Controllers\Admin_perusahaanController;
<<<<<<< HEAD
use App\Http\Controllers\Admin_masyarakatController;
use App\Http\Controllers\Admin_lowonganController;
use App\Http\Controllers\Admin_lamaranController;
use App\Http\Controllers\Admin_pelatihanController;
use App\Http\Controllers\Admin_PenPelatihanController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\login;
=======
use App\Http\Controllers\Admin_pelatihanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Perusahaan_lowonganController;
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5

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
<<<<<<< HEAD
        Route::resource('dashboard',Admin_dashboardController::class);
        Route::resource('perusahaan',Admin_perusahaanController::class);
        Route::resource('masyarakat',Admin_masyarakatController::class);
        Route::resource('lowongan',Admin_lowonganController::class);
        Route::resource('lamaran',Admin_lamaranController::class);
        Route::resource('pelatihan',Admin_pelatihanController::class);
        Route::resource('pengajuan',Admin_penPelatihanController::class);
=======
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

>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
});

Route::group(['prefix'=> 'perusahaan',  'middleware'=> 'auth:perusahaan'], function()
{
    Route::get('dashboard', function () {
        return view('perusahaan/dashboard');
<<<<<<< HEAD
    });
    Route::get('lowongan', function () {
        return view('perusahaan/lowongan');
    });
=======
    })->middleware('auth:perusahaan');

    Route::resource('lowongan',Perusahaan_lowonganController::class);
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
    
    Route::get('lamaran', function () {
        return view('perusahaan/lamaran');
    });
    
});

Route::group(['prefix'=> 'masyarakat',  'middleware'=> 'auth:masyarakat'], function()
{
    Route::get('homeuser', function () {
        return view('masyarakat/homeuser');
<<<<<<< HEAD
    });
=======
    })->middleware('auth:masyarakat');

>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
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



<<<<<<< HEAD
Route::resource('/',UtamaController::class);
=======
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5

Route::get('/pertamina', function () {
    return view('detailLoker');
});

