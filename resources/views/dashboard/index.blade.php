@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard de Registros</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5>Total registros</h5>
                    <h2>{{ $total }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5>Activos</h5>
                    <h2>{{ $activos }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5>Pendientes</h5>
                    <h2>{{ $pendientes }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- GRÁFICO CHART.JS -->
    <canvas id="estadoChart" height="100"></canvas>

    <h4>Últimos registros cargados</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ultimos as $registro)
                <tr>
                    <td>{{ $registro->codigo }}</td>
                    <td>{{ $registro->nombre }}</td>
                    <td>{{ $registro->email }}</td>
                    <td>{{ $registro->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/registros" class="btn btn-secondary mt-3">Ver todos los registros</a>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('estadoChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($porEstado->keys()) !!},
                datasets: [{
                    label: 'Registros por estado',
                    data: {!! json_encode($porEstado->values()) !!}
                }]
            }
        });
    </script>
</div>
@endsection