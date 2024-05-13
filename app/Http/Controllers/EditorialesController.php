<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $editoriales = Editorial::all();
        return view('editoriales.indexEditoriales', compact ('editoriales'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('editoriales.createEditoriales');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion
        
        $validated= $request->validate([
            'nombre'  => 'required',
            'domicilio'  => 'required',
            'comentario' =>'required',
            'telefono'  => 'numeric',
        ]);

        $editorial = new Editorial(); 
        $editorial->nombre=$request->nombre;
        $editorial->domicilio=$request->domicilio;
        $editorial->comentario=$request->comentario;
        $editorial->telefono=$request->telefono;
        $editorial->save(); 
    
    
        return redirect()->back();
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Editorial $editorial)
    {

        return view ('editoriales.showEditoriales', compact('editorial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editorial $editorial)
    {
        return view ('editoriales.editEditoriales', compact ('editorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editorial $editorial) // request es lo que recibe de la web y el editoriales es la informacion de la BD
    {

        //Validacion
        
        $validated= $request->validate([
            'nombre'  => 'required',
            'domicilio'  => 'required',
            'telefono'  => 'required',
        ]);
        
        $editorial->nombre=$request->nombre;
        $editorial->domicilio=$request->domicilio;
        $editorial->comentario=$request->comentario;
        $editorial->telefono=$request->telefono;
        $editorial->save(); 

        return redirect()->route('editorial.show',$editorial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editorial $editorial)
    {
        $editorial->delete();
        return redirect()->route('editorial.index');
    }
}
