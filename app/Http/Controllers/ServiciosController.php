<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Http\Controllers\CarritoController;

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
        
            $request->validate([ // se validan los campos ingresados
                'nombre' => 'required|max:45|min:7', // requerido | máximo 45 caracteres | mínimo 7 caracteres
                'descripcion' => 'required|max:255|min:10', // requerido | máximo 255 caracteres | mínimo 10 caracteres 
                'img' => 'required|image|max:2048', // requerido | tipo img | máximo 2048kb
                'precio' => 'required|numeric', // requerido | tipo numero
                'clases' => 'required|numeric', // requerido | tipo numero
                'categoria' => 'required' // requerido
            ], [
            
                //Devolución de errores: 
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
            
    

            if ($request->hasFile('img')) { // si se cargo una img y se paso la validación anterior
                
                $imagenNombre = time() . '.' . $request->img->extension(); // se cambia el nombre de la img con una fecha
    
             
                $request->img->move(public_path('uploads'), $imagenNombre); // y se guarda en la carpeta uploads
    
             
                Servicio::create([ // se crea el curso
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'img' => $imagenNombre,
                    'precio' => $request->precio,
                    'clases' => $request->clases,
                    'categoria' => $request->categoria,
                    'estudiantes' => 0
                ]);
            }
                // se lo redirecciona al usuario con un mensaje de éxito
            return redirect()->route('servicios.index')->with('feedback', ['messages' => ['Servicio agregado con éxito']]);
    
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
        $servicios = Servicio::find($id); // se obtiene el curso a editar
        $request->validate([
            'nombre' => 'required|max:45|min:7', // requerido | máximo 45 caracteres | mínimo 7 caracteres
            'descripcion' => 'required|max:255|min:10', // requerido | máximo 255 caracteres | mínimo 10 caracteres 
            'img' => 'image|max:2048', //  tipo img | máximo 2048kb
            'precio' => 'required|numeric', // requerido | tipo numero
            'clases' => 'required|numeric', // requerido | tipo numero
            'categoria' => 'required' // requerido
        ], [
        
            // Devolución de errores:
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe contener al menos 7 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 45 caracteres.',
            
           
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
            'descripcion.max' => 'La descripción no puede exceder los 255 caracteres.',
            
            'img.image' => 'El archivo debe ser una imagen válida.',
            'img.max' => 'La imagen no debe superar los 2048KB.',
            
      
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            
            
            'clases.required' => 'El número de clases es obligatorio.',
            'clases.numeric' => 'El número de clases debe ser un valor numérico.',
            
            'categoria.required' => 'La categoría es obligatoria.',
        ]);

        if ($request->hasFile('img')) { // si el campo img tiene una imagen
          
            $imagenNombre = time() . '.' . $request->img->extension(); // se modifica el nombre agregándole una fecha

         
            $request->img->move(public_path('uploads'), $imagenNombre); // se guarda en la carpeta uploads

            
            $servicios->update([  // y se actualiza el curso
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'img' => $imagenNombre,
                'precio' => $request->precio,
                'categoria' => $request->categoria,
                'clases' => $request->clases
            ]);
        } else { 
            $servicios->update([ // sino tiene img, se actualiza igual sin modificar la img existente
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'categoria' => $request->categoria,
                'clases' => $request->clases
            ]);
        }
        // se redirecciona al usuario con un mensaje de éxito
        return redirect()->route('servicios.index')->with('feedback', ['messages' => ['Servicio agregado con éxito']]);

    }


    public function destroy(string $id)
    {
        $servicios = Servicio::find($id);
        $servicios->delete();
        return redirect()->route('servicios.index')->with('feedback', ['messages' => ['Curso eliminado con éxito']]);
    }


    public function AgregarCarritoCurso(Request $request)
    {
        // Se valida que el curso sea un número, exista y que se haya enviado un dato.
        $request->validate([
            'curso_id' => 'required|integer|exists:servicios,id',
        ]);
    
        // Se toma al usuario autenticado.
        $user = auth()->user();
    
        // Se toma el id del curso ingresado.
        $curso = Servicio::find($request->curso_id);
    
        // Si existe el curso y el usuario.
        if ($curso && $user) {
            // Obtener o crear el carrito del usuario
            $carrito = $user->carrito()->firstOrCreate(); // Si no tiene un carrito, crea uno
    
            // Verificar si el curso ya está en el carrito
            if (!$carrito->servicios->contains($curso->id)) {
                // Agregar el curso al carrito del usuario
                $carrito->servicios()->attach($curso->id);
    
    
                return redirect()->back()->with('feedback', ['messages' => ['El curso ha sido agregado al carrito con éxito!']]);
            } else {
                return redirect()->back()->with('feedback', ['errors' => ['El curso ya está en tu carrito.']]);
            }
        }
    
        return redirect()->back()->with('feedback', ['errors' => ['El curso no existe o hubo un error.']]);
    }
    
    

    
}
