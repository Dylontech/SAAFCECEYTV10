@extends('tablar::page')

@section('content')
    <div class="container">
        <h1>Create Exam</h1>

        <form action="{{ route('examen.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <select class="form-control" id="profesor" name="profesor_id">
                    <option value="">Seleccione un profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id }}">{{ $profesor->Nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="materia" class="form-label">Materia</label>
                <select class="form-control" id="materia" name="materia_id">
                    <option value="">Seleccione una materia</option>
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->Materia_Nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="alumno" class="form-label">Alumno</label>
                <select class="form-control" id="alumno" name="alumno_id">
                    <option value="">Seleccione un alumno</option>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->Nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="CURP" class="form-label">CURP</label>
                <input type="text" class="form-control" id="CURP" name="CURP" required>
            </div>

            <div class="mb-3">
                <label for="matricula" class="form-label">Matricula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>

            <div class="mb-3">
    <label for="exam_types" class="form-label">Tipo de Examen</label><br>
    <label><input type="checkbox" name="exam_types[]" value="R2"> R2</label>
    <label><input type="checkbox" name="exam_types[]" value="REG"> REG</label>
    <label><input type="checkbox" name="exam_types[]" value="C.I."> C.I.</label>
    <label><input type="checkbox" name="exam_types[]" value="T.S."> T.S.</label>
    <label><input type="checkbox" name="exam_types[]" value="2DO C.I."> 2DO C.I.</label>
</div>

<input type="hidden" name="examen_estatus" value="Pendiente">

<button type="submit" class="btn btn-primary">Solicitar examen</button>
        </form>
    </div>
@endsection