@extends('layout/plantilla')

@section('tituloPagina', 'Agregar registro')

@section('css')
    @vite(['resources/css/actualizar.css'])
@endsection

@section('contenido')

<div class="card">
    <h5 class="card-header">Actualizar nuevo producto</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{route('productos.update', $productos->id)}}" method="POST">
                @csrf
                @method("PUT")

                <label for="producto">Producto</label>
                <input type="text" name="producto" id="producto" class="form-control input-actualizar" required value="{{$productos->producto}}">

                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control input-actualizar" required value="{{$productos->descripcion}}">

                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control input-actualizar" required value="{{$productos->precio}}">

                <label for="categoria">Categoría</label>
                <select name="categoria" id="categoria" class="form-control input-actualizar" required value="{{$productos->categoria}}">
                    <option value="">{{$productos->categoria}}</option>
                    <option value="Tecnología">Tecnología</option>
                    <option value="Consolas">Consolas</option>
                    <option value="Accesorios">Accesorios</option>
                    <option value="Decoración">Decoración</option>
                    <option value="Otro">Otro</option>
                </select>
                
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control input-actualizar" required value="{{$productos->stock}}">

                <label for="proveedor">Proveedor</label>
                <input type="text" name="proveedor" id="proveedor" class="form-control input-actualizar" required value="{{$productos->proveedor}}">

                <br>
                <a href="{{route('productos.index')}}" class="btn btn-info btn-regresar">
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-warning btn-actualizar">
                    <span class="fas fa-edit"></span> Actualizar
                </button>
            </form>
        </p>
    </div>
</div>

@endsection
