<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use App\Models\Novedad;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index(){

    $servicios = Servicio::orderBy('estudiantes', 'desc')->take(3)->get();
    return view('welcome', compact('servicios'));
   }

   public function cursos(){
    $servicios = Servicio::all();
    return view('cursos', compact('servicios'));
   }

   public function novedades() {
    $novedades = Novedad::orderBy('created_at', 'desc')->get();
    return view('novedades', compact('novedades'));
   }

   public function getNovedad($id){
    $novedades = Novedad::find($id);
    return view('detalles.novedad', compact('novedades'));
}

public function getCurso($id){
   $comprado = null;
   if(auth()->user()){
      $user = auth()->user(); 
      $comprado = $user->servicio($id);
   } 
   $servicio = Servicio::find($id);
  
   return view('detalles.curso', compact('servicio', 'comprado'));
}


}
