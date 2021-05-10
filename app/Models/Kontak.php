<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table="kontaks";
    protected $primaryKey = 'id_kontak';
    protected $fillable = ['id_kontak','nama','email','tujuan','pesan']; //field tabel
    public $timestamps = false;
}
