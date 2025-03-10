@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empleados de {{ $oficina->nombre }}</h1>

    <a href="{{route('empleados.create',$oficina)}}" class="btn btn-primary mb-3">Añadir Empleado</a>
    <a href="{{ route('oficinas.index') }}" class="btn btn-secondary mb-3">Volver a Oficinas</a>

    <ul class="list-group">
        @foreach ($empleados as $empleado)
            <li class="list-group-item">
                <strong>Nombre:</strong> {{ $empleado->nombre }} {{ $empleado->primer_apellido }} {{ $empleado->segundo_apellido }} <br>
                <strong>Rol:</strong> {{ $empleado->rol }} <br>
                <strong>Email:</strong> {{ $empleado->email }} <br>
                <a href="{{ route('empleados.edit', [$oficina, $empleado]) }}" class="btn btn-success btn-sm mt-2">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
