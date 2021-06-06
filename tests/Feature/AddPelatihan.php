<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Pelatihan;
use Tests\TestCase;



class AddPelatihan extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddPelatihan()
    {
        $data                   = new Pelatihan();
        $data->bidang_kejuruan  = " Otomotif";
        $data->deskripsi        = "Pekerjaan Otomotif";
        $data->persyaratan      = "Punya pengalaman min 1 tahun";
        $data->kuota            = "5";
        $data->waktu            = "3";
        $data->save();
        
//cek data apakah ada di db, jika ya  hasilnya OKE
        	$this->assertDatabaseHas('pelatihans', [
            'id_pelatihan'             => $data->id_pelatihan,
            'deskripsi'                  => $data->deskripsi,
            'bidang_kejuruan'           => $data->bidang_kejuruan,
            'persyaratan'               => $data->persyaratan,
            'kuota'                     => $data->kuota,
            'waktu'                     => $data->waktu,
           
            ]);
            
        //$this->assertTrue(true);
    }
}
