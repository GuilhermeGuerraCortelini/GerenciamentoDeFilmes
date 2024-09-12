<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filme>
 */
class FilmeFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'sinopse' => $this->faker->sentence(),
            'ano' => $this->faker->date(),
            'categoria' => $this->faker->word(),
            'capa' => 'CapasFilmes/' . $this->faker->word() . '.jpg', // Simula um caminho de imagem - pesquisei
            'link_trailer' => $this->faker->url(),
        ];
    }
}
