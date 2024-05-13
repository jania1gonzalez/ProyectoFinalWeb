<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class RutaLibroTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    use DatabaseMigrations;

    public function testAccesoRutaLibro()
    {
        $admin = User::factory()->create([
            'email' => 'harold.jesus.garciaramirez@gmail.com',
            'password' => bcrypt('69Harold69'), // Cambia 'password' por la contraseña que desees
            'role' => 'admin',
        ]);

        // Abrir una instancia del navegador y realizar las acciones
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin)
                    ->visit('/libro');

            // Verificar que la URL actual corresponde a la ruta '/libro'
            $browser->assertPathIs('/libro');
        });
    }

}
