<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Verifica que el usuario tenga el rol de administrador. Si este no lo tiene, se le redirecciona al login.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user && $user->role_id === 1){
            return $next($request);
        }
        return redirect()->route('auth.login')->with('feedback', ['errors' => ['No tienes acceso a esta sección.']] );
    }
}
