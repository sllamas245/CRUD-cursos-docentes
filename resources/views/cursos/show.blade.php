@extends('layouts.app')

@section('titulo', 'Detalle Curso')
@section('contenido')

<div class="text-center">
    <img style="height: 400px; width:500px; margin:20px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
    <div class="card-body">
        <p class="card-text">{{$cursito->descripcion}}</p>
        <br><br>
        <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-secondary">Editar curso</a>
        <br><br>
        <form class="form-group" action="/cursos/{{$cursito->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary">Eliminar</button>
        </form>
    </div>
</div>

@endsection
