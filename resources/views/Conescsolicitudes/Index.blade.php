@extends('tablar::page')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="container mt-5">
                    <h2 class="mb-4">Solicitudes</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('conescsolicitudes.index') }}" class="btn btn-warning">Solicitudes Pendientes</a>
                                    <a href="{{ route('conescsolicitudes.solapr') }}" class="btn btn-success">Solicitudes Aprobadas</a>
                                    <button class="btn btn-primary">Generar Reportes</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
<div class="container mt-5">
    <h2 class="mb-4">Pagos de Reinscripción en Trámite</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Matrícula</th>
                <th>Semestre</th>
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
                    <td>{{ $reinscripcion->reinscripcion_semestre }}</td>
                    <td>{{ $reinscripcion->reinscripcion_estatus }}</td>
                    <td>
                        <form action="{{ route('conesc.reinscripcion.approve', $reinscripcion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprobar</button>
                        </form>
                        <form action="{{ route('conesc.reinscripcion.reject', $reinscripcion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
                        @if($reinscripcion->reinscripcion_estatus == 'aprobado_reinscripcion_financiero')
                            <form action="{{ route('upload.reinscripcion', $reinscripcion->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                                @csrf
                                <input type="file" name="reinscripcion_archivo_foto" required>
                                <button type="submit" class="btn btn-info">Subir</button>
                            </form>
                        @endif
                        @if($reinscripcion->reinscripcion_archivo_foto)
                            <a href="{{ route('download.reinscripcion', $reinscripcion->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pagos en trámite</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <h2 class="mb-4 mt-5">Pagos de Constancias en Trámite</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Matrícula</th>
                <th>Tipo de Constancia</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($constancias as $constancia)
                <tr>
                    <td>{{ $constancia->nombre }}</td>
                    <td>{{ $constancia->CURP }}</td>
                    <td>{{ $constancia->matricula }}</td>
                    <td>{{ $constancia->constancia_tipo }}</td>
                    <td>{{ $constancia->constancia_estatus }}</td>
                    <td>
                        <form action="{{ route('conesc.constancia.approve', $constancia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprobar</button>
                        </form>
                        <form action="{{ route('conesc.constancia.reject', $constancia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
                        @if($constancia->constancia_estatus == 'aprobado_constancia_financiero')
                            <form action="{{ route('upload.constancia', $constancia->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                                @csrf
                                <input type="file" name="constancia_archivo_foto" required>
                                <button type="submit" class="btn btn-info">Subir</button>
                            </form>
                        @endif
                        @if($constancia->constancia_archivo_foto)
                            <a href="{{ route('download.constancia', $constancia->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pagos en trámite</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2 class="mb-4 mt-5">Pagos de Examen en Trámite</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Matrícula</th>
                <th>Tipo de Examen</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($examenes as $examen)
                <tr>
                    <td>{{ $examen->alumno }}</td>
                    <td>{{ $examen->CURP }}</td>
                    <td>{{ $examen->matricula }}</td>
                    <td>{{ $examen->examen_tipo }}</td>
                    <td>{{ $examen->examen_estatus }}</td>
                    <td>
                        <form action="{{ route('conesc.examen.approve', $examen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprobar</button>
                        </form>
                        <form action="{{ route('conesc.examen.reject', $examen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
                        @if($examen->examen_estatus == 'aprobado_examen_financiero')
                            <form action="{{ route('upload.examen', $examen->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                                @csrf
                                <input type="file" name="examen_archivo_foto" required>
                                <button type="submit" class="btn btn-info">Subir</button>
                            </form>
                        @endif
                        @if($examen->examen_archivo_foto)
                            <a href="{{ route('download.examen', $examen->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pagos en trámite</td>
                </tr>
            @endforelse
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection