@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Reinscripción</h2>
    <form action="{{ route('reinscripcion.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="CURP">CURP:</label>
            <input type="text" class="form-control" id="CURP" name="CURP" required>
        </div>
        <div class="form-group">
            <label for="matricula">Matricula:</label>
            <input type="text" class="form-control" id="matricula" name="matricula" required>
        </div>
        <div class="form-group">
            <label for="reinscripcion_semestre">Semestre:</label>
            <select class="form-control" id="reinscripcion_semestre" name="reinscripcion_semestre" required>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <input type="hidden" id="reinscripcion_estatus" name="reinscripcion_estatus" value="pendiente_Validar_Reinscripcion">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection