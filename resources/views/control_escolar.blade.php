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
    <h2>Panel de Control Escolar</h2>
    <p>Bienvenido al panel de control escolar. Aquí puedes gestionar las actividades relacionadas con el control escolar.</p>
    <!-- Agrega aquí el contenido específico para el control escolar -->
    <div class="btn-group" role="group" aria-label="Admin Actions">
        <a href="{{ route('conescsolicitudes.index') }}" class="btn btn-primary">Solicitudes</a>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Crear Post</a>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Cruds
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <li><a class="dropdown-item" href="{{ route('alumnos.index') }}">Alumno</a></li>
                <li><a class="dropdown-item" href="{{ route('materias.index') }}">Materia</a></li>
                <li><a class="dropdown-item" href="{{ route('profesores.index') }}">Profesor</a></li>
                <li><a class="dropdown-item" href="{{ route('blog.index') }}">blog</a></li>
            </ul>
        </div>
    </div>
    <div class="mt-4">
        <h4>Posts Recientes</h4>
        <div class="card-body">
        <div class="alert alert-primary">
        <div class="table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th class="fs-4">Título</th>
                        <th class="fs-4">Contenido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td class="fs-5">{{ $blog->title }}</td>
                        <td class="fs-5">{{ Str::limit($blog->content, 50) }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </div>
        </div>
    </div>
</div>

@endsection