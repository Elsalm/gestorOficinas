<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use Illuminate\Http\Request;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oficinas = Oficina::all();
        return view("oficinas.index", compact("oficinas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("oficinas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|string|max:255",
            "direccion" => "nullable|string|max:255",
        ]);

        Oficina::create([
            "nombre" => $request->nombre,
            "direccion" => $request->direccion,
        ]);

        return redirect()
            ->route("oficinas.index")
            ->with("success", "Oficina creada correctamente.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Oficina $oficina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oficina $oficina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oficina $oficina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oficina $oficina)
    {
        //
    }
}
