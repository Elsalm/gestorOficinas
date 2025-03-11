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
    <h1>Añadir Empleado a {{ $oficina->nombre }}</h1>

    <form action="{{ route('empleados.store', $oficina) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="primer_apellido" class="form-label">Primer Apellido</label>
            <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control">
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <input type="text" name="rol" id="rol" class="form-control">
        </div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{route('empleados.index', $oficina)}}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
