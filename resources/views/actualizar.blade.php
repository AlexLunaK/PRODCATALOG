@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')

<div class="card">
    <h5 class="card-header">Actualizar nuevo producto</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="">
                <label for="">Producto</label>
                <input type="text" name="producto" class="form-control" required>
                <label for="">Descripción</label>
                <input type="text" name="descripcion" class="form-control" required>
                <label for="">Precio</label>
                <input type="number" name="precio" class="form-control" required>
                <label for="">Categoría</label>
                <input type="text" name="categoria" class="form-control" required>
                <label for="">Stock</label>
                <input type="number" name="stock" class="form-control" required>
                <label for="">Proveedor</label>
                <input type="text" name="proveedor" class="form-control" required>
                <br>
                <a href="{{route('productos.index')}}" class="btn btn-info">Regresar</a>
                <button class="btn btn-warning">Agregar</button>
            </form>
        </p>
    </div>
</div>



    
@endsection
