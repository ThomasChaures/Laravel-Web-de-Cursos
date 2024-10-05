<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;
use App\Models\Novedad;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $usuarios = User::count();
        $novedades = Novedad::count();
        $cursos = Servicio::count();
        return view('panel.index', compact('usuarios', 'cursos', 'novedades'));
    }

    public function login(){
        return view('panel.login');
    }

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
    
        $usuario = User::where('email', $request->email)->first();
    
        if ($usuario && $usuario->role_id === 1) {
       
            if (Auth::attempt($credentials)) {
                
                return redirect()
                    ->route('admin.index')
                    ->with('feedback', ['messages' => ['Sesión iniciada con éxito.']]);
            } else {
               
                return back()
                    ->withErrors(['email' => 'Las credenciales no coinciden.'])
                    ->withInput();
            }
        }
    
        return back()
            ->withErrors(['email' => 'No tienes acceso.'])
            ->withInput();
    }
    
}
