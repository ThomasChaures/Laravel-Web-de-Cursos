<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
  
    public function index()
    {
        $servicios = Servicio::all();

        return view('panel.servicios.index', compact('servicios'));
    }

 
    public function create()
    {
        return view('panel.servicios.create');
    }


    public function store(Request $request)
    {
        try {
        
            $request->validate([
                'nombre' => 'required|max:45|min:10',
                'descripcion' => 'required|max:255|min:10',
                'img' => 'required|image|max:2048',
                'precio' => 'required|numeric',
                'clases' => 'required|numeric',
                'categoria' => 'required'
            ]);
    

            if ($request->hasFile('img')) {
                
                $imagenNombre = time() . '.' . $request->img->extension();
    
             
                $request->img->move(public_path('uploads'), $imagenNombre);
    
             
                Servicio::create([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'img' => $imagenNombre,
                    'precio' => $request->precio,
                    'clases' => $request->clases,
                    'categoria' => $request->categoria,
                    'estudiantes' => 0
                ]);
            }
    
            return back()->with('feedback', ['messages' => ['Servicio agregado con éxito']]);
    
        } catch (Exception $e) {
            
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    

 
    public function show(string $id)
    {
        $servicios = Servicio::find($id);
        return view('panel.servicios.show', compact('servicios'));
    }

   
    public function edit(string $id)
    {
        $servicios = Servicio::find($id);
        return view('panel.servicios.edit', compact('servicios'));
    }


    public function update(Request $request, string $id)
    {
        $servicios = Servicio::find($id);

        $request->validate([
            'nombre' => 'required|max:45|min:10',
            'descripcion' => 'required|max:255|min:10',
            'img' => 'image|max:2048',
            'precio' => 'required|numeric',
            'clases' => 'required|numeric',
            'categoria' => 'required'
        ]);

        if ($request->hasFile('img')) {
         
            $imagenNombre = time() . '.' . $request->img->extension();

         
            $request->img->move(public_path('uploads'), $imagenNombre);

            
            $servicios->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'img' => $imagenNombre,
                'precio' => $request->precio,
                'categoria' => $request->categoria,
                'clases' => $request->clases
            ]);
        } else {
            $servicios->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'categoria' => $request->categoria,
                'clases' => $request->clases
            ]);
        }
    return redirect()->route('servicios.index');

    }


    public function destroy(string $id)
    {
        $servicios = Servicio::find($id);
        $servicios->delete();
        return redirect()->route('servicios.index')->with('feedback', ['messages' => ['Curso eliminado con éxito']]);
    }


    public function ComprarCurso(Request $request){
        $user = auth()->user();

        $curso = Servicio::find($request->curso_id);

        if($curso && $user){
            if(!$user->servicios->contains($curso->id)){
                $user->servicios()->attach($curso->id);

                return redirect()->back()->with('feedback' , ['messages' => ['Compra realizada']]);
            }
        } 
    }
}
