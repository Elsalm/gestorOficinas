@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1>Editar Empleado de {{ $oficina->nombre }}</h1>

    <a href="{{ route('empleados.index', $oficina) }}" class="btn btn-secondary mb-3">Volver a Empleados</a>

    <form action="{{ route('empleados.update', [$oficina, $empleado]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="primer_apellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="{{ old('primer_apellido', $empleado->primer_apellido) }}" required>
        </div>

        <div class="mb-3">
            <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="{{ old('segundo_apellido', $empleado->segundo_apellido) }}">
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <input type="text" class="form-control" id="rol" name="rol" value="{{ old('rol', $empleado->rol) }}">
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}">
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $empleado->dni) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $empleado->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="oficina_id" class="form-label">Oficina</label>
            <select class="form-select" id="oficina_id" name="oficina_id" required>
                @foreach ($oficinas as $oficinaOption)
                    <option value="{{ $oficinaOption->id }}" {{ $oficinaOption->id == $empleado->oficina_id ? 'selected' : '' }}>
                        {{ $oficinaOption->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Empleado</button>
    </form>
</div>
@endsection
