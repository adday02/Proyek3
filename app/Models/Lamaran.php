<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $table='lamarans';
    protected $primaryKey = 'id_lamaran';
    protected $fillable = ['id_lamaran','nik','id_lowongan','file','status']; //field tabel
    public $timestamps = false;

    public function lowongan()
    {
	return $this->belongsTo('App\Models\Lowongan','id_lowongan');
    }
    public function masyarakat()
    {
	return $this->belongsTo('App\Models\Masyarakat','nik');
    }
}

