@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')

@section('css')
    @vite(['resources/css/agregar.css'])
@endsection

<div class="card agregar-producto-card">
    <h5 class="card-header">Agregar nuevo producto</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{route('productos.store')}}" method="POST">
                @csrf
                <label for="producto">Producto</label>
                <input type="text" name="producto" id="producto" class="form-control input-personalizado" required>

                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control input-personalizado" required>

                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control input-personalizado" required>

                <label for="categoria">Categoría</label>
                <input type="text" name="categoria" id="categoria" class="form-control input-personalizado" required>

                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control input-personalizado" required>

                <label for="proveedor">Proveedor</label>
                <input type="text" name="proveedor" id="proveedor" class="form-control input-personalizado" required>

                <br>
                <a href="{{route('productos.index')}}" class="btn btn-info btn-regresar">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-primary btn-agregar">
                    <span class="fas fa-plus-square"></span> Agregar
                </button>
            </form>
        </p>
    </div>
</div>

@endsection


