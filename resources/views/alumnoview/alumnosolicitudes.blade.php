@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Solicitudes de Alumno</h2>
    <p>Aquí puedes gestionar las solicitudes relacionadas con el Alumno.</p>
    <!-- Agrega aquí el contenido específico para las solicitudes -->

    <h3>Solicitar pago</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Acción</th>
                <th>Botón</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>Reinscripción</td>
                <td><a href="{{ url('/reinscripcion/' . $alumno->id . '/index') }}" class="btn btn-primary">Ir a Reinscripción</a></td>
            </tr>
            <tr>
                <td>Examen</td>
                <td><a href="{{ url('/examen/' . $alumno->id) }}" class="btn btn-primary">Ir a Examen</a></td>
            </tr>
            <tr>
                <td>Constancia</td>
                <td><a href="{{ url('/constancia' . $alumno->id . '/index') }}" class="btn btn-primary">Ir a Constancia</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection