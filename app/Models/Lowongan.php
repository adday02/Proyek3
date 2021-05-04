<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table='lowongans';
    protected $primaryKey = 'id_lowongan';
<<<<<<< HEAD
    protected $fillable = ['id_lowongan','id_perusahaan','jenis_pekerjaan','deskripsi_kerja','lokasi_kerja','gaji','kontak','status']; //field tabel
=======
    protected $fillable = ['id_lowongan','id_perusahaan','jenis_kerja','deskripsi_kerja','lokasi_kerja','gaji','kontak']; //field tabel
>>>>>>> 3a11165142b1418f3b27d7d3b5320a36bb46a4e5
    public $timestamps = false;

    public function perusahaan()
    {
	return $this->belongsTo('App\Models\Perusahaan','id_perusahaan');
    }
}
