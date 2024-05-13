<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class librosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('libros')->insert([
            [
                'nombre' => 'Nombre del Libro 1',
                'id_autor' => 1,
                'unidades_fisicas' => 10,
                'sinopsis' => 'Sinopsis del Libro 1',
                'genero' => 'Género del Libro 1',
                'virtual' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Puedes añadir más datos aquí según sea necesario
        ]);*/
        Libro::factory()->count(10)->create();
    }
}
