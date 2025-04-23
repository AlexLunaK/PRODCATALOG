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
            <hr>
            <p class="card-text">
                <form method="GET" action="{{ route('productos.index') }}" class="row mb-3">
                    <div class="col-md-2">
                        <a href="{{route('productos.create')}}" class="btn btn-primary">
                            <span class="fas fa-plus-square"></span>     Agregar producto
                        </a>
                    </div>
                    <div class="col-md-3">
                        <select name="categoria" class="form-select">
                            <option value="">Todas las Categorías</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="proveedor" class="form-select">
                            <option value="">Todos los Proveedores</option>
                            @foreach($proveedores as $prov)
                                <option value="{{ $prov }}" {{ request('proveedor') == $prov ? 'selected' : '' }}>{{ $prov }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary"><span class="fas fa-filter"></span> Filtrar</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary"><span class="fas fa-brush"></span> Limpiar</a>
                    </div>
                    <div class="col-md-2">
                        <select name="cantidad" class="form-select" onchange="this.form.submit()">
                            <option value="3" {{ request('cantidad') == 3 ? 'selected' : '' }}>3 registros</option>
                            <option value="5" {{ request('cantidad') == 5 ? 'selected' : '' }}>5 registros</option>
                            <option value="10" {{ request('cantidad') == 10 ? 'selected' : '' }}>10 registros</option>
                        </select>
                    </div>
                    
                </form>
                <hr>
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
                                    <td class="descripcion-corta">{{$item->descripcion}}</td>
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
                        <div class="col-md-4">
                            <p><span class="modal-label"><strong>Producto:</strong></span> <span id="detalleProducto" class="modal-data"></span></p>
                            <p><span class="modal-label"><strong>Precio:</strong></span> $<span id="detallePrecio" class="modal-data"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><span class="modal-label"><strong>Categoría:</strong></span> <span id="detalleCategoria" class="modal-data"></span></p>
                            <p><span class="modal-label"><strong>Stock:</strong></span> <span id="detalleStock" class="modal-data"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p><span class="modal-label"><strong>Proveedor:</strong></span> <span id="detalleProveedor" class="modal-data"></span></p>
                        </div>
                        <div class="col-md-12">
                            <p><span class="modal-label"><strong>Descripción:</strong></span></p>
                            <p id="detalleDescripcion" class="modal-data descripcion-larga"></p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
  
@endsection