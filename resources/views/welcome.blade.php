@extends('layout/plantilla')

@section('tituloPagina','Productos')

@section('contenido')
    <div class="row">
        <h1>Contenido de página</h1>
        <a href="{{route('productos.create')}}">Agregar producto</a>
        <a href="{{route('productos.edit')}}">Editar producto</a>
    </div>
@endsection