<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table='pelatihans';
    protected $primaryKey = 'id_pelatihan';
    protected $fillable = ['id_pelatihan','bidang_kejuruan','deskripsi','persyaratan','kuota','waktu']; //field tabel
    public $timestamps = false;
}
