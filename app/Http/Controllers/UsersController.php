<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('panel.users.index', compact('usuarios'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $compras = null; 
    $usuario = User::find($id); 

    if ($usuario && $usuario->servicios->isNotEmpty()) {
        $compras = $usuario->servicios; 
    }

    return view('panel.users.show', compact('usuario', 'compras'));
    }  

}
