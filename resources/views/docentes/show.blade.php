@extends('layouts.app')

@section('titulo', 'Detalle Docente')
@section('contenido')

<div class="text-center">
    <img style="height: 400px; width:500px; margin:20px" src="{{ Storage::url($docentico->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
    <div class="card-body">
        <h4 class="card-text">Nombres y apellidos: {{$docentico->nombres}} {{$docentico->apellidos}}</h4>
        <p class="card-text">email: {{$docentico->email}}</p>
        <p class="card-text">edad: {{$docentico->edad}} años.</p>
    </div>
    <a href="/docentes/{{$docentico->id}}/edit" class="btn btn-secondary">Editar Docente</a>
</div>

@endsection
