@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('contenido')

<div class="card">
    <h5 class="card-header">Actualizar nuevo producto</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{route('productos.update', $productos->id)}}" method="POST">
                @csrf
                @method("PUT")
                <label for="">Producto</label>
                <input type="text" name="producto" class="form-control" required value="{{$productos->producto}}">
                <label for="">Descripción</label>
                <input type="text" name="descripcion" class="form-control" required value="{{$productos->descripcion}}">
                <label for="">Precio</label>
                <input type="number" name="precio" class="form-control" required value="{{$productos->precio}}">
                <label for="">Categoría</label>
                <input type="text" name="categoria" class="form-control" required value="{{$productos->categoria}}">
                <label for="">Stock</label>
                <input type="number" name="stock" class="form-control" required value="{{$productos->stock}}">
                <label for="">Proveedor</label>
                <input type="text" name="proveedor" class="form-control" required value="{{$productos->proveedor}}">
                <br>
                <a href="{{route('productos.index')}}" class="btn btn-info">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-warning">
                    <span class="fas fa-edit"></span> Agregar
                </button>
            </form>
        </p>
    </div>
</div>



    
@endsection
