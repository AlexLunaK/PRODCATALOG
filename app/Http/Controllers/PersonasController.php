<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Página de Inicio
        $datos = Personas::orderBy('paterno','desc')->paginate(3);
        return view('inicio', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Formulario donde se agregan datos (No se agregan a base)
        return view('agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guarda datos en la DB
        $personas = new Personas();
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "¡Agregado con éxito!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Obtiene un registro de la tabla
        $personas = personas::find($id);
        return view("eliminar", compact('personas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //Trae los datos a editar y coloca en formulario
        $personas = personas::find($id);
        return view("actualizar", compact('personas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Actualiza los datos en la BD
        $personas = Personas::find($id);
        $personas->paterno = $request->post('paterno');
        $personas->materno = $request->post('materno');
        $personas->nombre = $request->post('nombre');
        $personas->fecha_nacimiento = $request->post('fecha_nacimiento');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "¡Actualizado con éxito!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Elimina un registro
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success", "¡Eliminado con éxito!");
    }
}
