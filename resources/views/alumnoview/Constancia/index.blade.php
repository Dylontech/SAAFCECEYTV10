@extends('tablar::page')



@section('content')
    <div class="container">
        <h1>Servicios</h1>

        <form action="{{ route('constancias.store') }}" method="POST">
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
           <div class="mb-3">
    <label for="constancia_tipo" class="form-label">Seleccione los servicios que necesita:</label><br>
    <label><input type="checkbox" name="constancia_tipo[]" value="Constancia de Inscripcion"> Constancia de Inscripcion</label>
    <label><input type="checkbox" name="constancia_tipo[]" value="Duplicado de Credencial"> Duplicado de Credencial</label>
    <label><input type="checkbox" name="constancia_tipo[]" value="Certificado Imcompleto Parcial"> Certificado Imcompleto Parcial</label>
    <label><input type="checkbox" name="constancia_tipo[]" value="Duplicado de Certificado de Estudios"> Duplicado de Certificado de Estudios</label>
    <label><input type="checkbox" name="constancia_tipo[]" value="Examen de Titulacion"> Examen de Titulacion</label>
    <label><input type="checkbox" name="constancia_tipo[]" value="Titulación (Tit y Exp de Ced. Prof)">Titulación (Tit y Exp de Ced. Prof)</label>
</div>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>
    </div>
@endsection