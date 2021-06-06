<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Masyarakat;

class editLamaran extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEditLamaran()
    {
        //edit data

        $lamarans = Lamaran::find(3);

        $lamarans->nik                  = '1234567890123453';
        $lamarans->id_lowongan          = '2';
        $lamarans->file                 ='1001757558.pdf';
        $lamarans->status               = 'Diterima'; // dulu masih dalam pengajuan
        
        $lamarans->save();

        //cek data apakah ada di db, jika ya  hasilnya OKE
        $this->assertDatabaseHas('lamarans', [

            'nik'                   => '1234567890123453',
            'id_lowongan'           => '2',
            'file'                  => '1001757558.pdf',
            'status'                => 'Diterima',
            
        ]);


        //$response = $this->get('/');

        //$response->assertStatus(200);
    
    }
}
