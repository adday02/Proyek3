<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_masyarakat extends Authenticatable
{
    protected $table="masyarakats";
    protected $primaryKey = 'nik';
    protected $fillable = ['nik','password','nama','jk','no_hp','pendidikan_terakhir','alamat','foto']; //field tabel
    public $timestamps = false;
}
