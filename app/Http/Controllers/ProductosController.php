<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    public function index(Request $request)
    {
        $query = Productos::query();
    
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
    
        if ($request->filled('proveedor')) {
            $query->where('proveedor', $request->proveedor);
        }
    
        $cantidad = $request->input('cantidad', 3);
    
        $datos = $query->orderBy('producto', 'asc')->paginate($cantidad)->appends($request->query());
    
        $categorias = Productos::select('categoria')->distinct()->pluck('categoria');
        $proveedores = Productos::select('proveedor')->distinct()->pluck('proveedor');
    
        return view('inicio', compact('datos', 'categorias', 'proveedores'));
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
        $productos->stock = $request->post('stock');
        $productos->proveedor = $request->post('proveedor');

        if ($request->filled('categoria')) {
            $productos->categoria = $request->categoria;
        }

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
