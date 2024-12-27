@extends('tablar::page')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Bienvenido a SAAFCECEYT
                </div>
                <h2 class="page-title">
                    <div>{{ Auth::user()->name }}</div>
                </h2>
            </div>
    <h2>Panel de Administrador</h2>
    <p>Bienvenido al panel de Administrador. Aquí puedes gestionar las actividades relacionadas con el Administrador.</p>
    <!-- Botones para navegación -->
    <div class="btn-group" role="group" aria-label="Admin Actions">
        <a href="{{ route('asignar.roles.form') }}" class="btn btn-primary">Asignar Roles</a>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">crear post</a>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Cruds
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{ route('alumnos.index') }}">Alumno</a></li>
                <li><a class="dropdown-item" href="{{ route('materias.index') }}">Materia</a></li>
                <li><a class="dropdown-item" href="{{ route('profesores.index') }}">Profesor</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection