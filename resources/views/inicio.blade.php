@extends('layout/plantilla')

@section('tituloPagina','Productos')

@section('contenido')
    <div class="card">
        <h5 class="card-header">Productos</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{$mensaje}}
                        </div>
                    @endif
                </div>
            </div>
        <h5 class="card-title text-center">Listado de productos en el sistema.</h5>
        <p>
            <a href="{{route('productos.create')}}" class="btn btn-primary">
                <span class="fas fa-plus-square"></span>  Agregar producto
            </a>
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
                                <td>
                                    <form action="{{route('productos.edit', $item->id)}}" method="GET">
                                        <button class="btn btn-warning btn-sm">
                                            <span class="fas fa-edit"></span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('productos.show', $item->id)}}" method="GET">
                                        <button class="btn btn-danger btn-sm">
                                            <span class="fas fa-trash-alt"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </p>
        </div>
    </div>
@endsection