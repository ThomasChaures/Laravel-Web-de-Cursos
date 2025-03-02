<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::with('rol')->get();
        return view('panel.users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'role_id' => 'required'
            ], [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser un texto.',
                'name.max' => 'El nombre no puede exceder los 100 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.string' => 'El correo electrónico debe ser un texto.',
                'email.email' => 'Debes ingresar un correo electrónico válido.',
                'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
                'email.unique' => 'Este correo electrónico ya está registrado.',
                'role_id.required' => 'El rol es obligatorio.',
                'password.required' => 'La contraseña es obligatoria.',
                'password.string' => 'La contraseña debe ser un texto.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id
            ]);

            return redirect()->route('usuarios.index')->with('feedback', ['messages' => ['Usuario agregado con éxito']]);

        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        $compras = $usuario && $usuario->servicios->isNotEmpty() ? $usuario->servicios : null;

        return view('panel.users.show', compact('usuario', 'compras'));
    }

    public function edit(string $id)
    {
        $usuario = User::find($id);
    
        return view('panel.users.edit', compact('usuario'));
    }


    public static function profile(){
        $usuario = User::find(auth()->id());
        $cursos = $usuario && $usuario->servicios->isNotEmpty() ? $usuario->servicios : null;
        return view('perfil', compact('usuario', 'cursos'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $usuario = User::find($id);

            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
                'role_id' => 'required',
                'password_new' => 'string|min:8|confirmed'
            ], [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser un texto.',
                'name.max' => 'El nombre no puede exceder los 100 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.string' => 'El correo electrónico debe ser un texto.',
                'email.email' => 'Debes ingresar un correo electrónico válido.',
                'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
                'email.unique' => 'Este correo electrónico ya está registrado.',
                'role_id.required' => 'El rol es obligatorio.',
            ]);

            $usuario->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id
            ]);

            return redirect()->route('perfil')->with('feedback', ['messages' => ['Usuario actualizado con éxito']]);

        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    
    public function updateUserView(Request $request){
        $usuario = User::find(auth()->id());

        return view('editar-perfil', compact('usuario'));
    }
    public function updateUserAuth(Request $request)
    {
        try {
            $usuario = User::find(auth()->id());

            $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:users,email,' . $usuario->id,
                'password' => 'nullable|string|min:8|confirmed'
            ], [
                'name.required' => 'El nombre es obligatorio.',
                'name.string' => 'El nombre debe ser un texto.',
                'name.max' => 'El nombre no puede exceder los 100 caracteres.',
                'email.required' => 'El correo electrónico es obligatorio.',
                'email.string' => 'El correo electrónico debe ser un texto.',
                'email.email' => 'Debes ingresar un correo electrónico válido.',
                'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
                'email.unique' => 'Este correo electrónico ya está registrado.',
            ]);

           if($request->password){
            $usuario->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
           }else{
            $usuario->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
           }

            return redirect()->route('perfil')->with('feedback', ['messages' => ['Usuario actualizado con éxito']]);

        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('feedback', ['messages' => ['Usuario eliminado con éxito']]);
    }
}
