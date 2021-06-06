<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pelatihan;


class editPelatihan extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEditPelatihan()
    {
        //edit data

        $pelatihans = Pelatihan::find(2);

        $pelatihans->bidang_kejuruan      = 'menjahit';
        $pelatihans->deskripsi            = 'menjahit dengan teknik yang diperlukan perusahaan'; // dulu masih menjahit apa saja
        $pelatihans->persyaratan          = 'belum menikah';
        $pelatihans->kuota                = '5'; 
        $pelatihans->waktu                = '3';
        $pelatihans->save();

        //cek data apakah ada di db, jika ya  hasilnya OKE
        $this->assertDatabaseHas('pelatihans', [
            
            'bidang_kejuruan'       => 'menjahit',
            'deskripsi'             => 'menjahit dengan teknik yang diperlukan perusahaan',
            'persyaratan'           => 'belum menikah',
            'kuota'                 => '5',
            'waktu'                 => '3',
            
        ]);


        //$response = $this->get('/');

        //$response->assertStatus(200);
    
    
    }
}
