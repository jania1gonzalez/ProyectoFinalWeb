<?php

namespace App\Http\Controllers;

use App\Mail\CorreoLibro;
use App\Models\Libro;
use Database\Seeders\librosSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['editoriales'])->get();
        return view('libros.indexLibros', compact ('libros'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('libros.createLibros');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #dd($request->file('imagen')->getClientOriginalExtension());

        $validated = $request->validate([
            'nombre'  => 'required',
            'editorial_id'  => 'numeric',
            'unidades_fisicas' =>'required',
            'sinopsis'  => 'required',
            'genero' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $virtual = $request->has('virtual') ? 1 : 0;

        $imagenNombre = $request->file('imagen')->getClientOriginalName(); // Obtener el nombre de la imagen
        $file = $request->file('imagen');
        $file->storeAs('/libros', $imagenNombre, 'public');

        $imagenUrl = 'storage/libros/' . $imagenNombre;

        $libro = new Libro();
        $libro->nombre = $validated['nombre'];
        $libro->editorial_id = $validated['editorial_id'];
        $libro->unidades_fisicas = $validated['unidades_fisicas'];
        $libro->sinopsis = $validated['sinopsis'];
        $libro->genero = $request->input('genero');
        $libro->virtual = $virtual;
        $libro->imagen = $imagenUrl; // Guardar la dirección de la imagen en la base de datos
        $libro->save();

        // Redirigir a la página de índice de libros u otra página según tus necesidades
        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {

        return view ('libros.showlibros', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view ('libros.editLibros', compact ('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'nombre' => 'required',
            'editorial_id' => 'numeric',
            'unidades_fisicas' => 'required',
            'sinopsis' => 'required',
            'genero' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Actualizar campos del libro
        $libro->nombre = $validated['nombre'];
        $libro->editorial_id = $validated['editorial_id'];
        $libro->unidades_fisicas = $validated['unidades_fisicas'];
        $libro->sinopsis = $validated['sinopsis'];
        $libro->genero = $validated['genero'];

        // Actualizar imagen si se proporciona una nueva
        if ($request->hasFile('imagen')) {
            $imagenNombre = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->storeAs('libros', $imagenNombre, 'public');
            $libro->imagen = 'storage/libros/' . $imagenNombre;
        }

        $libro->save();

        return redirect()->route('libro.index')->with('success', '¡Libro actualizado correctamente!');
    }

    public function descargar(Libro $libro)
    {
        
        // Construir la ruta completa de la imagen
        $imagen = $libro->imagen;
        //dd($rutaImagen = $imagen);
        $rutaImagen = $imagen;

        // Verificar si la imagen existe en el disco
        if (file_exists($rutaImagen)) {
            // Obtener el nombre de archivo para el cliente
            $nombreArchivo = basename($rutaImagen);

            // Descargar la imagen
            return response()->download($rutaImagen, $nombreArchivo);
        }

        // Si la imagen no existe, redirigir o mostrar un mensaje de error
        return redirect()->back()->with('error', 'La imagen no existe.');
    }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Libro $libro)
        {
            $libro->delete();
            return redirect()->route('libro.index');
        }

        public function sendMail(Libro $libro)
    {
        $mailable = new CorreoLibro($libro);
        Mail::to(Auth:: user()->email)->send($mailable);
    }
}
