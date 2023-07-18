<?php

namespace Database\Factories;

use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnuncioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anuncio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titulo = $this->faker->sentence();
        return [
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'extract' => $this->faker->text(50),
            'body'  => $this->faker->text(200)
            
        ];
    }
}
