<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Oficina;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Oficina $oficina)
    {
        $empleados = $oficina->empleados; // Relación (la definiremos en el modelo)
        return view("empleados.index", compact("oficina", "empleados"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Oficina $oficina)
    {
        return view("empleados.create", compact("oficina"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Oficina $oficina)
    {
        $request->validate([
            "nombre" => "required|string|max:255",
            "primer_apellido" => "required|string|max:255",
            "segundo_apellido" => "nullable|string|max:255",
            "rol" => "nullable|string|max:255",
            "fecha_nacimiento" => "nullable|date",
            "dni" => "required|string|max:20|unique:empleados,dni",
            "email" => "required|email|max:255|unique:empleados,email",
        ]);

        $oficina->empleados()->create($request->all());

        return redirect()
            ->route("empleados.index", $oficina)
            ->with("success", "Empleado creado correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oficina $oficina, Empleado $empleado)
    {
        return view("empleados.edit", compact("oficina", "empleado"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Oficina $oficina,
        Empleado $empleado
    ) {
        // Validación
        $request->validate([
            "nombre" => "required|string|max:255",
            "primer_apellido" => "required|string|max:255",
            "segundo_apellido" => "nullable|string|max:255",
            "rol" => "nullable|string|max:255",
            "fecha_nacimiento" => "nullable|date",
            "dni" =>
                "required|string|max:20|unique:empleados,dni," . $empleado->id,
            "email" =>
                "required|email|max:255|unique:empleados,email," .
                $empleado->id,
        ]);

        // Actualización del empleado
        $empleado->update($request->all());

        // Redireccionar al listado de empleados de la oficina
        return redirect()
            ->route("empleados.index", $oficina)
            ->with("success", "Empleado actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
