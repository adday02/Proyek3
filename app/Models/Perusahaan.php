<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table='perusahaans';
    protected $primaryKey = 'id_perusahaan';
    protected $fillable = ['id_perusahaan','password','nama','logo','email','website','alamat','deskripsi']; //field tabel
    public $timestamps = false;
}
