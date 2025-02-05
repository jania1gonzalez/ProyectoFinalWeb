<?php

namespace Database\Seeders;
use App\Models\Editorial;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Editorial::factory()->count(10)->create();
    }
}
