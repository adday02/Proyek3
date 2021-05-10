<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    protected $table='masyarakats';
    protected $primaryKey = 'nik';
    protected $fillable = ['nik','password','nama','jk','no_hp','pendidikan_terakhir','alamat','foto','status']; //field tabel
    public $timestamps = false;
}
