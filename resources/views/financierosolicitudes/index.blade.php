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
                                    <a href="{{ route('financierosolicitudes.index') }}" class="btn btn-primary">solicitudes pendientes</a>
                                    <a href="{{ route('financierosolicitudes.aprobadas') }}" class="btn btn-primary">aprobadas</a>
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
                        <form action="{{ route('reinscripcion.approve', $reinscripcion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprobado</button>
                        </form>
                        <form action="{{ route('reinscripcion.reject', $reinscripcion->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
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
                        <form action="{{ route('constancia.approve', $constancia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprobado</button>
                        </form>
                        <form action="{{ route('constancia.reject', $constancia->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
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
                        <form action="{{ route('examen.approve', $examen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Aprobado</button>
                        </form>
                        <form action="{{ route('examen.reject', $examen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Rechazar</button>
                        </form>
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