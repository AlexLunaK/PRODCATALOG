@extends('layout/plantilla')

@section('tituloPagina','Productos')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Productos</h5>
        <div class="card-body">
        <h5 class="card-title">Listado de productos en el sistema.</h5>
        <p>
            <a href="{{route('productos.create')}}" class="btn btn-primary">Agregar producto</a>
        </p>
        <hr>
        <p class="card-text">
            <div class="table">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Proveedor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                            <tr>
                                <td>{{$item->producto}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>{{$item->precio}}</td>
                                <td>{{$item->categoria}}</td>
                                <td>{{$item->stock}}</td>
                                <td>{{$item->proveedor}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </p>
        </div>
    </div>

    <div class="row">
        <a href="{{route('productos.edit')}}">Editar producto</a>
    </div>
@endsection