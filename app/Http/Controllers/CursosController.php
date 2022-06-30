<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePersonajeRequest;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con all accedemos a toda la infromación de la tabla
        $cursito = Curso::all();
        //return $cursito;
        return view('cursos.index', compact('cursito')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePersonajeRequest $request)
    {
        //return $request->all();
        //return $request-> input('descripcion');
        //Trae tods la infromacion de la tabla de cursos y la almacena en la instancia

        //implementamos validaciones

        /*$validacionDatos = $request->validate([
            'nombre'=>'required|max:10' ,
            'imagen'=>'required|image'
        ]); */

        $cursito = new Curso();
        $cursito->nombre = $request->input('nombre');
        $cursito->descripcion = $request->input('descripcion');
        if ($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        $cursito->save();
        return 'La información se ha guardado correctamente' ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.show', compact('cursito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.edit', compact('cursito'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cursito = Curso::find($id);

        $cursito->fill($request->except('imagen'));

            if($request->hasFile('imagen')){
                $cursito->imagen = $request->file('imagen')->store('public/cursos');

            }
        $cursito->save();
        return 'Actualizado';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursito = Curso::find($id) ;
        //return $cursito;
        $urlImagenBD = $cursito->imagen;
        //return $urlImagenBD;
        //$rutaCompleta = public_path().$urlImagenBD ;
        //return $rutaCompleta ;
        $nombreImagen = str_replace('public/' , '/storage/',$urlImagenBD ) ;
        $rutaCompleta = public_path().$nombreImagen ;
        $cursito ->delete();
        return 'Eliminado';
    }
}
