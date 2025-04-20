<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    public function index()
    {
        //Página de Inicio
        $datos = Productos::all();
        return view('inicio', compact('datos'));
    }

    public function create()
    {
        //Formulario donde se agregan datos
        return view('agregar');
    }

    public function store(Request $request)
    {
        //Guarda datos en la BD
        $productos = new Productos();
        $productos->producto = $request->post('producto');
        $productos->descripcion = $request->post('descripcion');
        $productos->precio = $request->post('precio');
        $productos->categoria = $request->post('categoria');
        $productos->stock = $request->post('stock');
        $productos->proveedor = $request->post('proveedor');
        $productos->save();

        return redirect()->route('productos.index')->with('success','¡Agregado con éxito!');;
    }

    public function show(Productos $productos)
    {
        //Obtiene registro de la tabla
        return view('eliminar');
    }

    public function edit(Productos $productos)
    {
        //Obtiene datos a editar y coloca en formulario
        return view('actualizar');
    }

    public function update(Request $request, Productos $productos)
    {
        //Actualiza datos en BD
    }

    public function destroy(Productos $productos)
    {
        //Elimina un registro
    }
}
