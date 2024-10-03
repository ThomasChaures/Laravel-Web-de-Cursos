<?php

namespace App\Http\Controllers;
use App\Models\User;
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
}
