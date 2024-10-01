<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login')
            ->with('feedback', ['messages' => ['Sesión cerrada']]);
    }

    public function authenticate(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Obtener las credenciales
        $credentials = $request->only('email', 'password');

        // Intentar autenticar
        if (Auth::attempt($credentials)) {
            return redirect()
                ->intended('home')
                ->with('feedback', ['messages' => ['Sesión iniciada con éxito.']]);
        }
        return redirect()
            ->back()
            ->withInput()
            ->with('feedback', ['errors' => ['Credenciales incorrectas']]);
    }

    public function newAccount(Request $request){
        $request->validate([
            'name'=> 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()
            ->route('home')
            ->with('feedback', ['messages' => ['Cuenta creada con exito.']]);
    }
}
