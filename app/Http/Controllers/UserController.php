<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function profile()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Retornar la vista del perfil del usuario
        return view('user.profile', ['user' => $user]);
    }
}
