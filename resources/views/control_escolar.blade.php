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
</div>
@endsection