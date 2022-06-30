@extends('layouts.app')

@section('titulo', 'Listado Cursos')

@section('contenido')

<h3>Crear un Nuevo Docente</h3>
<br>
<form action="/docentes" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        @foreach ($errors->all() as $alerta )
           <div class="alert alert-danger" role="alert">
               <ul>
                <li>{{$alerta}}</li>
               </ul>
           </div>
        @endforeach
    @endif
    <div class="form-group">
        <label for="nombres">Ingrese los Nombre del docente</label>
        <input id="nombres" class="form-control" type="text" name="nombres">
    </div>
    <div class="form-group">
        <label for="apellidos">Ingrese los Apellidos del docente</label>
        <input id="apellidos" class="form-control" type="text" name="apellidos">
    </div>
    <div class="form-group">
        <label for="email">Ingrese email del docente</label>
        <input id="email" class="form-control" type="email" name="email">
    </div>
    <div class="form-group">
        <label for="edad">Ingrese la edad del docente</label>
        <input id="edad" class="form-control" type="number" name="edad">
    </div>
    <div class="form-group">
        <label for="descrip">Cargue la foto del docente</label>
        <br>
        <input id="imagen"  type="file" name="imagen">
    </div>
    <button class="btn btn-secondary" type="submit">Guardar</button>
</form>

@endsection


{{--
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container">
        <h3>Crear un Nuevo Curso</h3>
        <br>
        <form action="/cursos" method="post">
            @csrf
            <div class="form-group">
                <label for="nombre">Ingrese el Nombre del Curso</label>
                <input id="nombre" class="form-control" type="text" name="nombre">
            </div>
            <div class="form-group">
                <label for="descrip">Ingrese la descripción del curso</label>
                <input id="descrip" class="form-control" type="text" name="descripcion">
            </div>
            <button class="btn btn-secondary" type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
--}}

