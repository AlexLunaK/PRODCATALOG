@extends('layout/plantilla')

@section('tituloPagina','Productos')

@section('css')
    @vite(['resources/css/inicio.css','resources/js/inicio.js'])
@endsection

@section('contenido')
    <div class="card">
        <h5 class="card-header">Listado de Productos</h5>
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
            <p>
                <a href="{{route('productos.create')}}" class="btn btn-primary">
                    <span class="fas fa-plus-square"></span>     Agregar producto
                </a>
            </p>
            <hr>
            <p class="card-text">
                <div class="table">
                    <table class="table table-sm table-bordered">
                        <thead class="text-center align-middle">
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Proveedor</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Detalles</th>
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr class="text-center align-middle">
                                    <td>{{$item->producto}}</td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->precio}}</td>
                                    <td>{{$item->categoria}}</td>
                                    <td>{{$item->stock}}</td>
                                    <td>{{$item->proveedor}}</td>
                                    <td class="btn-cell">
                                        <form action="{{route('productos.edit', $item->id)}}" method="GET">
                                            <button class="btn btn-warning btn-sm">
                                                <span class="fas fa-edit"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="btn-cell">
                                        <form action="{{route('productos.show', $item->id)}}" method="GET">
                                            <button class="btn btn-danger btn-sm">
                                                <span class="fas fa-trash-alt"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="btn-cell">
                                        <button 
                                            class="btn btn-info btn-sm btn-detalles" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalDetalles"
                                            data-producto="{{$item->producto}}"
                                            data-descripcion="{{$item->descripcion}}"
                                            data-precio="{{$item->precio}}"
                                            data-categoria="{{$item->categoria}}"
                                            data-stock="{{$item->stock}}"
                                            data-proveedor="{{$item->proveedor}}">
                                            <span class="fas fa-eye"></span>
                                        </button>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        {{$datos->links()}}
                    </div>
                </div>
            </p>
        </div>
    </div>

    <div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="modalDetallesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetallesLabel">Detalles del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><span class="modal-label"><strong>Producto:</strong></span> <span id="detalleProducto" class="modal-data"></span></p>
                            <p><span class="modal-label"><strong>Precio:</strong></span> $<span id="detallePrecio" class="modal-data"></span></p>
                            <p><span class="modal-label"><strong>Stock:</strong></span> <span id="detalleStock" class="modal-data"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="modal-label"><strong>Descripción:</strong></span> <span id="detalleDescripcion" class="modal-data"></span></p>
                            <p><span class="modal-label"><strong>Categoría:</strong></span> <span id="detalleCategoria" class="modal-data"></span></p>
                            <p><span class="modal-label"><strong>Proveedor:</strong></span> <span id="detalleProveedor" class="modal-data"></span></p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
  
@endsection