<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'name' => 'User1',
            'email' => 'usuario1@example.com',
            'username' => 'usuario1',
            'password' => bcrypt('edu123'),
            'admin' => true,  // ou false
        ]);
        Usuario::factory()->count(10)->create();
    }
}
