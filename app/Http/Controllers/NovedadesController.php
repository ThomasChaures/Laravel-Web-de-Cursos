<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use App\Models\User;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novedades = Novedad::all();
        return view('panel.novedades.index', compact('novedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.novedades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $userId = auth()->user()->id; // se obtiene el id del admin autenticado
            $request->validate([ // se validan los datos ingresados
                'titulo' => 'required|max:45|min:5', // requerido | maximo 45 caracteres | minimo 5 caracteres
                'contenido' => 'required|min:10', // requerido | minimo 10 caracteres
                'img' => 'required|image|max:2048', // requerido | tipo img | maximo 2048kb
            ], [ 
                
                // Devoluciones de error
                'titulo.required' => 'El título es obligatorio.',
                'titulo.min' => 'El título debe contener al menos 10 caracteres.',
                'titulo.max' => 'El título no puede exceder los 45 caracteres.',
                
                
                'contenido.required' => 'El contenido es obligatorio.',
                'contenido.min' => 'El contenido debe tener al menos 10 caracteres.',
                
               
                'img.required' => 'La imagen es obligatoria.',
                'img.image' => 'El archivo debe ser una imagen válida.',
                'img.max' => 'La imagen no debe superar los 2048KB.',
            ]);
            

            if($request->hasFile('img')){ // Si tiene una img entonces se procede a crear la novedad
                $imgNombre = time() . '.' . $request->img->extension(); // se cambia al nombre de la img con una fecha
                $request->img->move(public_path('uploads'), $imgNombre); // se guarda en la carpeta uploads

                Novedad::create([ // se crea la novedad
                    'titulo' => $request->titulo,
                    'contenido' => $request->contenido,
                    'img' => $imgNombre,
                    'user_id' => $userId
                ]);

                // si todo es correcto se redirecciona al usuario con un mensaje de exito
                return redirect()->route('novedades.index')->with('feedback', ['messages' => ['Novedad agregada con éxito']]);
            }
        } catch (Exception $e){
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $novedad = Novedad::find($id);
        $creador = User::find($novedad->user_id);
        $creadorName = $creador->name;
        return view('panel.novedades.show', compact('novedad', 'creadorName'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $novedad = Novedad::find($id);
       return view('panel.novedades.edit', compact('novedad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $novedad = Novedad::find($id); // obtengo la novedad

            $request->validate([ // valido si existen los campos y otras cosas
                'titulo' => 'required|max:45|min:5', // requerido|maximo 45 caracteres | minimo 5
                'contenido' => 'required|min:10',  // requerido| minimo 10
                'img' => 'image|max:2048', // tipo img | maixmo 2048 kb
            ], [
          
                // Devolucion de errores:
                'titulo.required' => 'El título es obligatorio.',
                'titulo.min' => 'El título debe contener al menos 10 caracteres.',
                'titulo.max' => 'El título no puede exceder los 45 caracteres.',
                
                'contenido.required' => 'El contenido es obligatorio.',
                'contenido.min' => 'El contenido debe tener al menos 10 caracteres.',
                
                'img.image' => 'El archivo debe ser una imagen válida.',
                'img.max' => 'La imagen no debe superar los 2048KB.',
            ]);
            
            // Si el request tiene una img 
            if($request->hasFile('img')){
                $imgNombre = time() . '.' . $request->img->extension(); // se le modifica el nombre con una fecha
                $request->img->move(public_path('uploads'), $imgNombre); // y se la guarda en la carpeta public con el nombre en cuestion.

                $novedad->update([ // si se pasaron todas las validaciones se crea la novedad
                    'titulo' => $request->titulo,
                    'contenido' => $request->contenido,
                    'img' => $imgNombre
                ]);

                return redirect()->route('novedades.index')->with('feedback', ['messages' => ['Novedad editada con éxito']]); // y se lo redirije con un mensaje de exito
            }else{ // si no tiene img sucede lo mismo, no mas que no modifica la img
                $novedad->update([
                    'titulo' => $request->titulo,
                    'contenido' => $request->contenido,
                ]);
                return redirect()->route('novedades.index')->with('feedback', ['messages' => ['Novedad editada con éxito']]);
            }
        } catch (Exception $e){
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $novedad = Novedad::find($id);
      $novedad->delete();
      return redirect()->route('novedades.index')->with('feedback', ['messages' => ['Novedad eliminada con éxito']]);
    }
}
