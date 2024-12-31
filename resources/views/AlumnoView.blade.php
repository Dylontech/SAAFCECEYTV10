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
    <h2>Panel de Alumno</h2>
    <p>Bienvenido al panel de Alumno. Aquí puedes gestionar las actividades relacionadas con el Alumno.</p>
    <!-- Agrega aquí el contenido específico para el control escolar -->
    <a href="{{ route('alumnosolicitudes') }}" class="btn btn-primary">Ir a Solicitudes de Alumno</a>
</div>
    <div>
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
@endsection