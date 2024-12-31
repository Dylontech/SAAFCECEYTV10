@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Reinscripción</h2>
    <p>Aquí puedes gestionar tu reinscripción.</p>

    <table class="table">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Información</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre</td>
                <td>{{ $alumno->Nombre }}</td>
            </tr>
            <tr>
                <td>Correo Electrónico</td>
                <td>{{ $alumno->email }}</td>
            </tr>
            <tr>
                <td>Matrícula</td>
                <td>{{ $alumno->Matricula }}</td>
            </tr>
            <tr>
                <td>CURP</td>
                <td>{{ $alumno->CURP }}</td>
            </tr>
            <tr>
                <td>Grupo</td>
                <td>{{ $alumno->Grupo }}</td>
            </tr>
            <tr>
                <td>Semestre</td>
                <td>
                    <select class="form-control" name="semestre">
                        <option value="1" {{ $alumno->Semestre == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $alumno->Semestre == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $alumno->Semestre == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $alumno->Semestre == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $alumno->Semestre == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $alumno->Semestre == 6 ? 'selected' : '' }}>6</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Estado del Pago</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $alumno->PagoEstado }}%;" aria-valuenow="{{ $alumno->PagoEstado }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $alumno->PagoEstado }}%
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection