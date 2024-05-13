<?php

namespace Database\Factories;
use App\Models\Editorial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Editorial>
 */
class EditorialFactory extends Factory
{
    protected $model = Editorial::class;
    
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'correo' => $this->faker->unique()->safeEmail(),
            'comentario' => $this->faker->text(),
            'ciudad' => $this->faker->city(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
