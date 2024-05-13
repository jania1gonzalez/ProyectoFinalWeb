<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    protected $model = \App\Models\Libro::class;

    public function definition(): array
    {
        $nombresImagenes = scandir(public_path('storage/libros/'));

        // Filtrar los nombres de archivo para eliminar . y ..
        $nombresImagenes = array_filter($nombresImagenes, function($nombre) {
            return !in_array($nombre, ['.', '..']);
        });
    
        // Construir las URLs de las imágenes
        $urlsImagenes = array_map(function ($nombreImagen) {
            return 'storage/libros/' . $nombreImagen;
        }, $nombresImagenes);

        return [
            'nombre' => $this->faker->sentence(),
            'editorial_id' => \App\Models\Editorial::factory(), // Utilizamos el factory de Editorial para obtener una clave foránea válida
            'unidades_fisicas' => $this->faker->numberBetween(1, 100),
            'sinopsis' => $this->faker->paragraph(),
            'genero' => $this->faker->word(),
            'virtual' => $this->faker->boolean(),
            'imagen' => $this->faker->randomElement($urlsImagenes),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}