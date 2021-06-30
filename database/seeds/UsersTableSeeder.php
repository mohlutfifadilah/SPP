<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'ni' => '123456789',
            'id_level' => 1,
            'foto' => 'default.jpg',
            'password' => Hash::make('admin'),
            'nama' => 'Admin',
            'email' => 'admin@gmail.com'
        ]);

        User::create([
            'ni' => '1234567890',
            'id_level' => 2,
            'foto' => 'default.jpg',
            'password' => Hash::make('petugas'),
            'nama' => 'petugas',
            'email' => 'petugas@gmail.com'
        ]);
    }
}
