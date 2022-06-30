<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con all accedemos a toda la infromación de la tabla
        $docentico = Docente::all();
        //return $cursito;
        return view('docentes.index', compact('docentico')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $docentico = new Docente();
        $docentico->nombres = $request->input('nombres');
        $docentico->apellidos = $request->input('apellidos');
        $docentico->email = $request->input('email');
        $docentico->edad = $request->input('edad');
        if ($request->hasFile('imagen')){
            $docentico->imagen = $request->file('imagen')->store('public/docentes');
        }
        $docentico->save();
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
        $docentico = Docente::find($id);
        return view('docentes.show', compact('docentico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docentico = Docente::find($id);
        return view('docentes.edit', compact('docentico'));

    }

    //comentario para git
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $docentico = Docente::find($id);

        $docentico->fill($request->except('imagen'));

            if($request->hasFile('imagen')){
                $docentico->imagen = $request->file('imagen')->store('public/docentes');

            }
        $docentico->save();
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
        //
    }
}
