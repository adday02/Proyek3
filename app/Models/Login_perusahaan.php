<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_perusahaan extends Authenticatable
{
    protected $table="perusahaans";
    protected $primaryKey = 'id_perusahaan';
    protected $fillable = ['id_perusahaan','password','nama','logo','email','website','alamat','deskripsi']; //field tabel
    public $timestamps = false;
}
