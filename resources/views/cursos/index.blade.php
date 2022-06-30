@extends('layouts.app')

@section('titulo', 'Listado Cursos')

@section('contenido')

<div class="row">
    {{-- Vamos a intrerpolar la informacion de php--}}
    @foreach ( $cursito as $curso )
    <div class="col-sm">
        <div class="card">
            <img class="card-img-top" src="{{Storage::url($curso->imagen)}}" alt="" width="500" height="300">
            <div class="card-body">
                <h5 class="card-title">Nombre del curso: {{$curso->nombre}}</h5>
                <p class="card-text">Descripcion del curso: {{$curso->descripcion}}</p>
                <a name="" id="" class="btn btn-secondary" href="/cursos/{{$curso->id}}" role="button">Ver mas</a>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
