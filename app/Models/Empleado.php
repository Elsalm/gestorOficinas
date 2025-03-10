<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        "nombre",
        "primer_apellido",
        "segundo_apellido",
        "rol",
        "fecha_nacimiento",
        "dni",
        "email",
        "oficina_id", // No olvides incluir la relación con la oficina
    ];

    public function oficina()
    {
        return $this->belongsTo(Oficina::class);
    }
}
