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

    /**
     * Función para cerrar sesión.
     * @param request
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Se llama la función logout de Auth

        $request->session()->invalidate();  // Se invalida la sesión
        $request->session()->regenerateToken(); // Se regenera el token que es utilizado por ejemplo en los forms cuando se usa @CSRF

        return redirect() // Se redirecciona al login con un mensaje.
            ->route('auth.login')
            ->with('feedback', ['messages' => ['Sesión cerrada']]);
    }


    /**
     * Realiza la autenticación del usuario.
     * @param credenciales
     */
    public function authenticate(Request $request)
    {
        
        $request->validate([ // Se valida que el array de request tenga los datos pedidos.
            'email' => 'required|email',  // requerido|que sea un email valido
            'password' => 'required', // requerido
        ], [
            
            // Devolución de errores:
            'email.required' => 'El correo electrónico es obligatorio.', // Si no puso nada
            'email.email' => 'Debes ingresar un correo electrónico válido.', // Si el mail es invalido
          
            'password.required' => 'La contraseña es obligatoria.', // Si no puso nada
        ]);
        

       
        $credentials = $request->only('email', 'password'); // Obtenemos los valores ingresados
        $remember = $request->has('remember'); // Obtenemos si el usuario quiere mantener iniciada la sesión
       
        if (Auth::attempt($credentials, $remember)) { // Realizamos la validación del intento de logeo
            return redirect() // Si pasa, se lo redirecciona al home con un mensaje de éxito
                ->route('home')
                ->with('feedback', ['messages' => ['Sesión iniciada con éxito.']]);
        }
        return redirect() // Si no pasa, se lo redirecciona en donde estaba y se le aclara que sus credenciales no son correctas
            ->back()
            ->withInput()
            ->with('feedback', ['errors' => ['Credenciales incorrectas']]);
    }


    /**
     * Función para registrar al usuario.
     * @param credenciales
     */
    public function newAccount(Request $request){
        $request->validate([ // Se validan los campos ingresados en el formulario
            'name' => 'required|string|max:100',  // Requerido|Texto|máximo 100 caracteres
            'email' => 'required|string|email|max:255|unique:users,email', // Requerido|Texto|que sea un email valido|máximo 255 caracteres| que el mail sea único
            'password' => 'required|string|min:8|confirmed', // Requerido|Texto|mínimo 8 caracteres|que se confirme 2 veces la password
        ], [
           
            // Devoluciones de error:
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no puede exceder los 100 caracteres.',
            
  
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser un texto.',
            'email.email' => 'Debes ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
        
           
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser un texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);
        

        // Si se pasan las validaciones, se procede a crear el usuario
        $user = User::create([  // Mediante el modelo y create generamos un usuario de tipo 2, o sea no administrador.
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        Auth::login($user); // Se mantiene logeado

        return redirect() // Y se lo redirecciona al home con un mensaje de éxito
            ->route('home')
            ->with('feedback', ['messages' => ['Cuenta creada con éxito.']]);
    }
}
