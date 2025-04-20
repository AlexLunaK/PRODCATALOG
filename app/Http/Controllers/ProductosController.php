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

        return redirect()->route('productos.index')->with('success','¡Agregado con éxito!');
    }

    public function show($id)
    {
        //Obtiene registro de la tabla
        $productos = Productos::find($id);
        return view('eliminar', compact('productos'));
    }

    public function edit($id)
    {
        //Obtiene datos a editar y coloca en formulario
        $productos = Productos::find($id);
        return view('actualizar', compact('productos'));
    }

    public function update(Request $request, $id)
    {
        //Actualiza datos en BD
        $productos = Productos::find($id);
        $productos->producto = $request->post('producto');
        $productos->descripcion = $request->post('descripcion');
        $productos->precio = $request->post('precio');
        $productos->categoria = $request->post('categoria');
        $productos->stock = $request->post('stock');
        $productos->proveedor = $request->post('proveedor');
        $productos->save();

        return redirect()->route('productos.index')->with('success','¡Actualizado con éxito!');
    }

    public function destroy($id)
    {
        //Elimina un registro
        $productos = Productos::find($id);
        $productos->delete();
        return redirect()->route('productos.index')->with('success','¡Eliminado con éxito!');
    }
}
