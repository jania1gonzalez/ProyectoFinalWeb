<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirigir al inicio de sesión si el usuario no está autenticado
        }
            
        // Verificar si el usuario tiene el rol de administrador
        if (auth()->user()->role <> 'admin') {
            abort(403); // Acceso prohibido si el usuario no tiene el rol de administrador
            
        }

        return $next($request);
    }
}
