<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('editorial_id'); // Cambiamos a unsignedBigInteger para la clave foránea
            $table->decimal('unidades_fisicas');
            $table->string('sinopsis');
            $table->string('genero');
            $table->boolean('virtual');
            $table->timestamps();

            // Definimos la clave foránea
            $table->foreign('editorial_id')->references('id')->on('editoriales');
        });
    }

    public function down()
    {
        Schema::dropIfExists('libros');
    }
};
