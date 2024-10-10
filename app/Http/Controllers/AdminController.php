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

        $usuarios = User::count(); // numero de usuarios que existen
        $novedades = Novedad::count(); // numero de novedades que existen
        $cursos = Servicio::count(); // numero de cursos que existen 
        return view('panel.index', compact('usuarios', 'cursos', 'novedades'));
    }

    public function login(){
        return view('panel.login');
    }

       /**
     * Funcion para cerrar sesion.
     * @param request
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Se llama la funcion logut de Auth

        $request->session()->invalidate();  // Se invalida la sesion
        $request->session()->regenerateToken(); // Se regenera el token que es utilizado por ejemplo en los forms cuando se usa @csrf

        return redirect() // Se redirecciona al login con un mensaje.
            ->route('admin.login')
            ->with('feedback', ['messages' => ['Sesión cerrada']]);
    }

    public function authenticate(Request $request) {
        $request->validate([ // Se valida que el array de request tenga los datos pedidos.
            'email' => 'required|email',  // requerido|que sea un eamil valido
            'password' => 'required', // requerido
        ], [
            
            // Devloucion de errores:
            'email.required' => 'El correo electrónico es obligatorio.', // Si no puso nada
            'email.email' => 'Debes ingresar un correo electrónico válido.', // Si el mail es invalido
          
            'password.required' => 'La contraseña es obligatoria.', // Si no puso nada
        ]);
        
    
        $credentials = $request->only('email', 'password');
    
        $usuario = User::where('email', $request->email)->first();
    
        if ($usuario && $usuario->role_id === 1) {
       
            if (Auth::attempt($credentials)) {
                
                return redirect()
                    ->route('admin-index')
                    ->with('feedback', ['messages' => ['Sesión iniciada con éxito.']]);
            } 
            
        }else{
            return redirect()
            ->back()
            ->with('feedback', ['errors' => ['Usted no cuenta con los permisos requeridos.']])
            ->withInput();
        }
    
        return back()
            ->withErrors(['email' => 'No tienes acceso.'])
            ->withInput();
    }
    
}
