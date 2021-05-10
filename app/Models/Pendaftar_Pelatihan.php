<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar_Pelatihan extends Model
{
    protected $table='pendaftar_pelatihans';
    protected $primaryKey = 'id_pen_pelatihan';
    protected $fillable = ['id_pen_pelatihan','nik','id_pelatihan','file','status']; //field tabel
    public $timestamps = false;

    public function masyarakat()
    {
	return $this->belongsTo('App\Models\Masyarakat','nik');
    }

    public function pelatihan()
    {
	return $this->belongsTo('App\Models\Pelatihan','id_pelatihan');
    }
}
