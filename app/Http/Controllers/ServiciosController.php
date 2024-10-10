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
                'nombre' => 'required|max:45|min:7',
                'descripcion' => 'required|max:255|min:10',
                'img' => 'required|image|max:2048',
                'precio' => 'required|numeric',
                'clases' => 'required|numeric',
                'categoria' => 'required'
            ], [
            
                'nombre.required' => 'El nombre es obligatorio.',
                'nombre.min' => 'El nombre debe contener al menos 7 caracteres.',
                'nombre.max' => 'El nombre no puede tener más de 45 caracteres.',
                
               
                'descripcion.required' => 'La descripción es obligatoria.',
                'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
                'descripcion.max' => 'La descripción no puede exceder los 255 caracteres.',
                
                
                'img.required' => 'La imagen es obligatoria.',
                'img.image' => 'El archivo debe ser una imagen válida.',
                'img.max' => 'La imagen no debe superar los 2048KB.',
                
          
                'precio.required' => 'El precio es obligatorio.',
                'precio.numeric' => 'El precio debe ser un valor numérico.',
                
                
                'clases.required' => 'El número de clases es obligatorio.',
                'clases.numeric' => 'El número de clases debe ser un valor numérico.',
                
                'categoria.required' => 'La categoría es obligatoria.',
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


    /**
     * Funcion para realizar la accion simulada de compra.
     * 
     * @param servicio_id
     */
    public function ComprarCurso(Request $request){
        // Se valida que el curos sea un numero, exista y que se haya enviado un dato.
        $request->validate([
            'curso_id' => 'required|integer|exists:servicios,id',
        ]);

        // Se toma al usuario autenticado.
        $user = auth()->user();

        // Se toma el id del curso ingresado.
        $curso = Servicio::find($request->curso_id);

        // Si existe el curso y el usuario.
        if($curso && $user){
            // Si el usuario todavia no compro el curso.
            if(!$user->servicios->contains($curso->id)){
                // Se agrega al usuario.
                $user->servicios()->attach($curso->id);
                // Se actualiza el numero de estudiantes.
                $curso->update([
                    'estudiantes' => $curso->estudiantes + 1 
                ]);
                return redirect()->back()->with('feedback' , ['messages' => ['Compra realizada']]);
            }else{
                return redirect()->back()->with('feedback' , ['errors' => ['Compra no realizada']]);
            }
        } 
    }
}
