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
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay pagos en trámite</td>
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
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay pagos en trámite</td>
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
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay pagos en trámite</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection