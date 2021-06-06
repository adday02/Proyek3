<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Lowongan;

class edit_lowongantets extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testedit_lowongantest()
    {
        
        //edit data

        $lowongans = Lowongan::find(2);

        $lowongans->id_perusahaan     = '1805034';
        $lowongans->nama              = 'admin';
        $lowongans->jenis_kerja       ='Magang';
        $lowongans->deskripsi_kerja   = 'admin adalaah';
        $lowongans->lokasi_kerja       = 'bandung';
        $lowongans->gaji                = '120000000';
        $lowongans->kontak              = '0896754321';
        $lowongans->status              = 'Diterima';  // dulu masih dalam pengajuan
        
        $lowongans->save();

        //cek data apakah ada di db, jika ya  hasilnya OKE
        $this->assertDatabaseHas('lowongans', [

            'id_perusahaan'         => '1805034',
            'nama'                  => 'admin',
            'jenis_kerja'           => 'Magang',
            'deskripsi_kerja'       => 'admin adalaah',
            'lokasi_kerja'          => 'bandung',
            'gaji'                  => '120000000',
            'kontak'                => '0896754321',
            'status'                => 'Diterima',
            
        ]);


        //$response = $this->get('/');

        //$response->assertStatus(200);
    }
}
