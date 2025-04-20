@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')

<div class="card">
    <h5 class="card-header">Eliminar un producto</h5>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                ¿Estás seguro que deseas eliminar este registro?
                <table class="table table-sm table-hover">
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
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <form action="">
                    <a href="{{route('productos.index')}}" class="btn btn-info">Regresar</a>
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </p>
    </div>
</div>



    
@endsection
