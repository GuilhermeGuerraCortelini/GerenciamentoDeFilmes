<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Lembrando que o call é pra conseguir pegar vários Seeders
        $this->call([
            UsuariosSeeder::class,
            FilmesSeeder::class
        ]);
    }
}
