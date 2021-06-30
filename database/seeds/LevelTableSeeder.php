<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Level::create([
            'nama_level' => 'Admin'
        ]);

        Level::create([
            'nama_level' => 'Petugas'
        ]);
        Level::create([
            'nama_level' => 'Siswa'
        ]);

    }
}