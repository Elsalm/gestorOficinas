@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Oficinas</h1>

    <a href="{{ route('oficinas.create') }}" class="btn btn-primary mb-3">Añadir Oficina</a>

    <ul class="list-group">
        @foreach ($oficinas as $oficina)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('empleados.index', $oficina->id) }}" class="text-decoration-none">
                    <strong>{{ $oficina->nombre }}</strong> <br>
                    <small class="text-muted">{{ $oficina->direccion }}</small>
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
