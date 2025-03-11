<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\EmpleadoController;

Route::get("/", function () {
    return redirect()->route("oficinas.index");
});

Route::get("/oficinas", [OficinaController::class, "index"])->name(
    "oficinas.index"
);

Route::post("/oficinas", [OficinaController::class, "store"])->name(
    "oficinas.store"
);

Route::get("/oficinas/create", [OficinaController::class, "create"])->name(
    "oficinas.create"
);

Route::get("/oficinas/{oficina}/empleados", [
    EmpleadoController::class,
    "index",
])->name("empleados.index");

Route::get("/oficinas/{oficina}/empleados/create", [
    EmpleadoController::class,
    "create",
])->name("empleados.create");

Route::post("/oficinas/{oficina}/empleados", [
    EmpleadoController::class,
    "store",
])->name("empleados.store");

Route::get("/oficinas/{oficina}/empleados/{empleado}/edit", [
    EmpleadoController::class,
    "edit",
])->name("empleados.edit");

Route::put("/oficinas/{oficina}/empleados/{empleado}", [
    EmpleadoController::class,
    "update",
])->name("empleados.update");
