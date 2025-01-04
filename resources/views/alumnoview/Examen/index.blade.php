@extends('tablar::page')

@section('content')
    <div class="container">
        <h1>Solicitar Examen</h1>

        <form action="{{ route('examen.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <select class="form-control" id="profesor" name="profesor">
                    <option value="">Seleccione un profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id }}">{{ $profesor->Nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="materia" class="form-label">Materia</label>
                <select class="form-control" id="materia" name="materia">
                    <option value="">Seleccione una materia</option>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->Materia_Nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="alumno" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="CURP">CURP:</label>
                <input type="text" class="form-control" id="CURP" name="CURP" required>
            </div>
            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" class="form-control" id="matricula" name="matricula" value="{{ Auth::user()->User_name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="examen_tipo" class="form-label">Tipo de Examen</label><br>
                <label><input type="checkbox" name="examen_tipo[]" value="R2"> R2</label>
                <label><input type="checkbox" name="examen_tipo[]" value="REG"> REG</label>
                <label><input type="checkbox" name="examen_tipo[]" value="C.I."> C.I.</label>
                <label><input type="checkbox" name="examen_tipo[]" value="T.S."> T.S.</label>
                <label><input type="checkbox" name="examen_tipo[]" value="2DO C.I."> 2DO C.I.</label>
            </div>

            <input type="hidden" name="examen_estatus" value="Pendiente">

            <button type="submit" class="btn btn-primary">Solicitar examen</button>
        </form>
    </div>
@endsection