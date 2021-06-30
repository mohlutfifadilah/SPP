<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}