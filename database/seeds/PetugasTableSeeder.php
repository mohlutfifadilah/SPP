<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Petugas;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Petugas::create([
            'nip' => '123456789',
            'nama_petugas' => 'Admin'
        ]);
        Petugas::create([
            'nip' => '1234567890',
            'nama_petugas' => 'Petugas'
        ]);
    }
}