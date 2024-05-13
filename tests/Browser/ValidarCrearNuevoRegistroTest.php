<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ValidarCrearNuevoRegistroTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCrearComentario(): void
    {
        $admin = User::factory()->create([
            'email' => 'harold.jesus.garciaramirez@gmail.com',
            'password' => bcrypt('69Harold69'), // Cambia 'password' por la contraseña que desees
            'role' => 'admin',
        ]);

        // Abrir una instancia del navegador y realizar las acciones
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
        });

        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin)
                    ->visit('/comentario/create') // Reemplaza '/ruta-para-crear-registro' con la ruta real
                    ->type('nombre', 'ejemplo')
                    ->type('correo', 'ejemplo@correo.com')
                    ->type('contraseña', 'password123')
                    ->type('comentario', 'Este es un comentario')
                    ->select('genero', 'masculino')
                    ->type('ciudad', 'Guadalajara')
                    ->type('campo_extra', '0') // Reemplaza 'campo_extra' con el nombre real del campo
                    ->press('Enviar'); // Reemplaza 'Enviar' con el texto real del botón para enviar el formulario

            // Verificar que se redireccione correctamente después de crear el registro
            $browser->assertPathIs('/comentario/create'); // Reemplaza '/ruta-de-redireccionamiento' con la ruta real
        });

        // Verificar que se haya creado el registro en la base de datos
        $this->assertDatabaseHas('tabla', [
            'nombre' => 'ejemplo',
            'correo' => 'ejemplo@correo.com',
            'contraseña' => bcrypt('password123'), // Asegúrate de que estés almacenando las contraseñas en la base de datos utilizando bcrypt
            'comentario' => 'Este es un comentario',
            'genero' => 'masculino',
            'ciudad' => 'Guadalajara',
            'campo_extra' => '0',
        ]);
    }
}
