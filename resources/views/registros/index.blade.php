@extends('layouts.app')

@section('title', 'Registros')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORMULARIO DE BÚSQUEDA -->
    <form method="GET" class="mb-3">
        <div class="input-group">
            <input 
                type="text" 
                name="buscar" 
                class="form-control" 
                placeholder="Buscar por código, nombre o email"
                value="{{ request('buscar') }}"
            >
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </div>
    </form>

    <a href="/registros/exportar" class="btn btn-success mb-3">
        Exportar CSV
    </a>

    <h2 class="mb-4">Listado de registros</h2>

    @if($registros->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->codigo }}</td>
                        <td>{{ $registro->nombre }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->fecha }}</td>
                        <td>{{ $registro->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            No hay registros cargados.
        </div>
    @endif
</div>
@endsection