<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table='lowongans';
    protected $primaryKey = 'id_lowongan';
    protected $fillable = ['id_lowongan','nama','id_perusahaan','jenis_kerja','deskripsi_kerja','lokasi_kerja','gaji','persyaratan','kontak','status']; //field tabel
    public $timestamps = false;

    public function perusahaan()
    {
	return $this->belongsTo('App\Models\Perusahaan','id_perusahaan');
    }
}
