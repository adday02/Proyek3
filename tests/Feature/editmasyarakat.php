<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Masyarakat;

class editmasyarakat extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_editmasyarakat()
    {
        $masyarakats = Masyarakat::find(1234567890123456);

        $masyarakats->password = 'Masyarakat123';
        $masyarakats->nama = 'liyah';
        $masyarakats->no_hp = '098123412563';
        $masyarakats->pendidikan_terakhir = 'D3';
        $masyarakats->alamat = 'jkt';
        $masyarakats->foto ='876924135.jpg';
        $masyarakats->status = 'Dalam Proses';

        $masyarakats->save();

        $this->assertDatabaseHas('masyarakats', [
            'password'  => 'Masyarakat123',
            'nama'      => 'liyah',
            'no_hp'      => '098123412563',
            'pendidikan_terakhir'      => 'D3',
            'alamat'      => 'jkt', // awalnya bali
            'foto'      => '876924135.jpg',
            'status'      => 'Dalam proses',
        ]);
    }
}
