<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            // Se a requisição for Ajax, retorna erro 401
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Sessão expirada.'], 401);
            }

            // Redireciona para a tela de login
            return redirect()->route('login')->with('message', 'Sua sessão expirou. Faça login novamente.');
        }

        return $next($request);
    }
}


