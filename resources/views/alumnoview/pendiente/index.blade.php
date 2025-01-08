@extends('tablar::page')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Pagos de Reinscripción en Trámite
                </div>
                <h2 class="page-title">
                    {{ Auth::user()->name }}
                </h2>
            </div>
        </div>
    </div>
</div>

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
            @forelse ($reinscripcionesPendientes as $reinscripcion)
                <tr>
                    <td>{{ $reinscripcion->nombre }}</td>
                    <td>{{ $reinscripcion->CURP }}</td>
                    <td>{{ $reinscripcion->matricula }}</td>
                    <td>{{ $reinscripcion->reinscripcion_semestre }}</td>
                    <td>{{ $reinscripcion->reinscripcion_estatus }}</td>
                    <td>
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

    <h2 class="mb-4 mt-5">Pagos de Reinscripción Aprobados</h2>
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
            @forelse ($reinscripcionesAprobadas as $reinscripcion)
                <tr>
                    <td>{{ $reinscripcion->nombre }}</td>
                    <td>{{ $reinscripcion->CURP }}</td>
                    <td>{{ $reinscripcion->matricula }}</td>
                    <td>{{ $reinscripcion->reinscripcion_semestre }}</td>
                    <td>{{ $reinscripcion->reinscripcion_estatus }}</td>
                    <td>
                        <form action="{{ route('upload.reinscripcion', $reinscripcion->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="reinscripcion_archivo_foto" required>
                            <button type="submit" class="btn btn-info">Subir</button>
                        </form>
                        @if($reinscripcion->reinscripcion_archivo_foto)
                            <a href="{{ route('download.reinscripcion', $reinscripcion->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pagos aprobados</td>
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
            @forelse ($constanciasPendientes as $constancia)
                <tr>
                    <td>{{ $constancia->nombre }}</td>
                    <td>{{ $constancia->CURP }}</td>
                    <td>{{ $constancia->matricula }}</td>
                    <td>{{ $constancia->constancia_tipo }}</td>
                    <td>{{ $constancia->constancia_estatus }}</td>
                    <td>
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

    <h2 class="mb-4 mt-5">Pagos de Constancias Aprobados</h2>
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
            @forelse ($constanciasAprobadas as $constancia)
                <tr>
                    <td>{{ $constancia->nombre }}</td>
                    <td>{{ $constancia->CURP }}</td>
                    <td>{{ $constancia->matricula }}</td>
                    <td>{{ $constancia->constancia_tipo }}</td>
                    <td>{{ $constancia->constancia_estatus }}</td>
                    <td>
                        <form action="{{ route('upload.constancia', $constancia->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="constancia_archivo_foto" required>
                            <button type="submit" class="btn btn-info">Subir</button>
                        </form>
                        @if($constancia->constancia_archivo_foto)
                            <a href="{{ route('download.constancia', $constancia->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pagos aprobados</td>
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
            @forelse ($examenesPendientes as $examen)
                <tr>
                    <td>{{ $examen->alumno }}</td>
                    <td>{{ $examen->CURP }}</td>
                    <td>{{ $examen->matricula }}</td>
                    <td>{{ $examen->examen_tipo }}</td>
                    <td>{{ $examen->examen_estatus }}</td>
                    <td>
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

    <h2 class="mb-4 mt-5">Pagos de Examen Aprobados</h2>
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
            @forelse ($examenesAprobadas as $examen)
                <tr>
                    <td>{{ $examen->alumno }}</td>
                    <td>{{ $examen->CURP }}</td>
                    <td>{{ $examen->matricula }}</td>
                    <td>{{ $examen->examen_tipo }}</td>
                    <td>{{ $examen->examen_estatus }}</td>
                    <td>
                        <form action="{{ route('upload.examen', $examen->id) }}" method="POST" enctype="multipart/form-data" style="display:inline;">
                            @csrf
                            <input type="file" name="examen_archivo_foto" required>
                            <button type="submit" class="btn btn-info">Subir</button>
                        </form>
                        @if($examen->examen_archivo_foto)
                            <a href="{{ route('download.examen', $examen->id) }}" class="btn btn-secondary">Descargar</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay pagos aprobados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection