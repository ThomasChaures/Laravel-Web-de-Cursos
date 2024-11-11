<?php

namespace App\Http\Controllers;
use App\Models\Servicio;
use App\Models\Novedad;
use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\CursoEnCarrito;


class FrontController extends Controller
{
   public function index(){
    $servicios = Servicio::orderBy('estudiantes', 'desc')->take(3)->get(); // toma los 3 servicios con mas estudiantes
    return view('welcome', compact('servicios'));
   }

   public function cursos(){
    $servicios = Servicio::all();
    return view('cursos', compact('servicios'));
   }

   public function novedades() {
    $novedades = Novedad::orderBy('created_at', 'desc')->get(); // ordena las novedades según cual es mas reciente
    return view('novedades', compact('novedades'));
   }

   public function getNovedad($id){
    $novedades = Novedad::find($id);
    return view('detalles.novedad', compact('novedades'));
}

public function getCurso($id){
   $comprado = null;
   $enCarrito = false;

   if(auth()->user()){ 
       $user = auth()->user(); 
       
      
       $comprado = $user->servicio($id); 
       

       $carrito = $user->carrito;
       
       if($carrito){
          
           $enCarrito = $carrito->servicios()->where('servicios_id', $id)->exists();
       }
   } 
   
   
   $servicio = Servicio::find($id);


   return view('detalles.curso', compact('servicio', 'comprado', 'enCarrito'));
}



}
