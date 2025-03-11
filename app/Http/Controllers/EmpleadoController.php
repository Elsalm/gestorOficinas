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
        $request->validate(
            [
                "nombre" => "required|string|max:255",
                "primer_apellido" => "required|string|max:255",
                "segundo_apellido" => "nullable|string|max:255",
                "rol" => "nullable|string|max:255",
                "fecha_nacimiento" => "nullable|date",
                "dni" => [
                    "required",
                    "string",
                    "max:20",
                    "unique:empleados,dni",
                    "regex:/^[0-9]{8}[A-Za-z]$/",
                ],
                "email" => "required|email|max:255|unique:empleados,email",
            ],
            [
                "dni.regex" =>
                    "El formato del DNI no es válido. Debe tener 8 números seguidos de una letra.",
                "dni.required" => "El campo DNI es obligatorio.",
                "dni.unique" => "El DNI ya está registrado en el sistema.",
                "email.required" => "El campo email es obligatorio.",
                "email.email" =>
                    "Debes introducir una dirección de email válida.",
                "email.unique" => "El email ya está registrado en el sistema.",
            ]
        );

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
        $oficinas = Oficina::all();
        return view(
            "empleados.edit",
            compact("oficina", "empleado", "oficinas")
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Oficina $oficina,
        Empleado $empleado
    ) {
        $request->validate(
            [
                "nombre" => "required|string|max:255",
                "primer_apellido" => "required|string|max:255",
                "segundo_apellido" => "nullable|string|max:255",
                "rol" => "nullable|string|max:255",
                "fecha_nacimiento" => "nullable|date",
                "dni" =>
                    "required|string|max:20|unique:empleados,dni," .
                    $empleado->id,
                "email" =>
                    "required|email|max:255|unique:empleados,email," .
                    $empleado->id,
                "oficina_id" => "required|exists:oficinas,id",
            ],
            [
                "email.required" => "El campo email es obligatorio.",
                "email.email" =>
                    "Debes introducir una dirección de email válida.",
                "email.unique" => "El email ya está registrado en el sistema.",
            ]
        );

        $empleado->update($request->all());

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
