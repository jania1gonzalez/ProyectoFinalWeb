<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Libro;
use App\Models\Editoriales;
use App\Models\login;
use App\Models\index;
use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function login ($tipo=null) {
        return view('login', compact ('tipo'));
        ///return view ('info')-> with('tipo', $tipo))
    }
    public function index ($tipo=null) {
        return view('index', compact ('tipo'));
        ///return view ('info')-> with('tipo', $tipo))
    }
    
}
