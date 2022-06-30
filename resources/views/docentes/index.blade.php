@extends('layouts.app')

@section('titulo', 'Listado Docentes')

@section('contenido')

<div class="row">
    {{-- Vamos a intrerpolar la informacion de php--}}
    @foreach ( $docentico as $docente )
    <div class="col-sm">
        <div class="card">
            <img class="card-img-top" src="{{Storage::url($docente->imagen)}}" alt="" width="500" height="300">
            <div class="card-body">
                <h5 class="card-title">Nombres y Apellidos: {{$docente->nombres}} {{$docente->apellidos}}</h5>
                <p class="card-text">email: {{$docente->email}}</p>
                <a name="" id="" class="btn btn-secondary" href="/docentes/{{$docente->id}}" role="button">Ver mas</a>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
