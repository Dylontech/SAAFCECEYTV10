@extends('tablar::page')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Solicitudes Aprobadas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Matrícula</th>
                <th>Tipo</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reinscripciones as $reinscripcion)
                <tr>
                    <td>{{ $reinscripcion->nombre }}</td>
                    <td>{{ $reinscripcion->CURP }}</td>
                    <td>{{ $reinscripcion->matricula }}</td>
                    <td>Reinscripción</td>
                    <td>{{ $reinscripcion->reinscripcion_estatus }}</td>
                    <td>
                        @if($reinscripcion->reinscripcion_archivo_foto)
                            <a href="{{ route('download.reinscripcion', $reinscripcion->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                        <form action="{{ route('upload.reinscripcion', $reinscripcion->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="reinscripcion_archivo_foto" required>
                            <button type="submit" class="btn btn-info">Subir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay solicitudes de reinscripción aprobadas</td>
                </tr>
            @endforelse

            @forelse ($constancias as $constancia)
                <tr>
                    <td>{{ $constancia->nombre }}</td>
                    <td>{{ $constancia->CURP }}</td>
                    <td>{{ $constancia->matricula }}</td>
                    <td>Constancia</td>
                    <td>{{ $constancia->constancia_estatus }}</td>
                    <td>
                        @if($constancia->constancia_archivo_foto)
                            <a href="{{ route('download.constancia', $constancia->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                        <form action="{{ route('upload.constancia', $constancia->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="constancia_archivo_foto" required>
                            <button type="submit" class="btn btn-info">Subir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay solicitudes de constancia aprobadas</td>
                </tr>
            @endforelse

            @forelse ($examenes as $examen)
                <tr>
                    <td>{{ $examen->alumno }}</td>
                    <td>{{ $examen->CURP }}</td>
                    <td>{{ $examen->matricula }}</td>
                    <td>Examen</td>
                    <td>{{ $examen->examen_estatus }}</td>
                    <td>
                        @if($examen->examen_archivo_foto)
                            <a href="{{ route('download.examen', $examen->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                        <form action="{{ route('upload.examen', $examen->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="examen_archivo_foto" required>
                            <button type="submit" class="btn btn-info">Subir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay solicitudes de examen aprobadas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection