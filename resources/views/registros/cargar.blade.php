@extends('layouts.app')

@section('title', 'Cargar Registros')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Cargar archivo CSV</h2>
    
    <form method="POST" action="/registros/cargar" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="archivo" class="form-label">Seleccionar archivo CSV</label>
            <input type="file" class="form-control" id="archivo" name="archivo" accept=".csv,.txt">
        </div>
        <button type="submit" class="btn btn-primary">Subir archivo</button>
    </form>
</div>
@endsection