<?php
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\EditorialesController;
use App\Http\Controllers\SitioController;
use App\Http\Controllers\AdminMiddlewareController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\libro;
use App\Models\Editorial;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('formulario', function () {
        return view('comentario.formulario');
    });
});
    Route::get('/informacion/{tipo?}', [SitioController::class, 'info'])->name('informacion');

    Route::get('/contacto',[ComentarioController::class, 'create']);

    Route::post('/contacto', [ComentarioController::class, 'store']);

    Route::resource('comentario', ComentarioController::class);

    ///fin de comentario e inicio de libro

    Route::get('libro', function () {
        return view('libro.createLibros');
    });

    Route::get('/libro', [LibrosController::class, 'create']);

    Route::post('/libro', [LibrosController::class, 'store']);

    Route::resource('libro', LibrosController::class);

    Route::put('libro/{libro}', 'LibrosController@update')->name('libro.update');
    Route::post('libro/{libro}/imagen', [LibrosController::class, 'descargar'])->name('libro.descargar');


    /// fin de libro e inicio de editoriales

    Route::get('editorial', function () {
        return view('editorial.createEditoriales');
    });

    Route::get('/editorial', [EditorialesController::class, 'create']);

    Route::post('/editorial', [EditorialesController::class, 'store']);

Route::resource('editorial', EditorialesController::class);

Route::put('editorial/{editorial}', 'EditorialesController@update')->name('editorial.update');