@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')

<div class="card">
    <h5 class="card-header">Eliminar un producto</h5>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                ¿Estás seguro que deseas eliminar este registro?
                <table class="table table-sm table-hover table-bordered" style="background-color: white">
                    <th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Proveedor</th>
                    </th>
                    <tbody>
                        <tr>
                            <td>{{$productos->producto}}</td>
                            <td>{{$productos->descripcion}}</td>
                            <td>{{$productos->precio}}</td>
                            <td>{{$productos->categoria}}</td>
                            <td>{{$productos->stock}}</td>
                            <td>{{$productos->proveedor}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <form action="{{route('productos.destroy',$productos->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('productos.index')}}" class="btn btn-info">
                        <span class="fas fa-undo-alt"></span> Regresar
                    </a>
                    <button class="btn btn-danger">
                        <span class="fas fa-trash-alt"></span> Eliminar
                    </button>
                </form>
            </div>
        </p>
    </div>
</div>



    
@endsection
