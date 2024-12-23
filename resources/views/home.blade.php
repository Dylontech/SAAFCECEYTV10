@extends('tablar::page')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Bienvenido a SAAFCECEYT
                    </div>
                    <h2 class="page-title">
                        ADMIN
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        Crear Nuevo Post
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Novedades</h3>
                        </div>                   
                        <div class="card-body">
                            <div class="alert alert-primary">
                                <div class="alert-title">¡Bienvenido!</div>
                                <p>Este es el panel de administración de SAAFCECEYT.</p>
                            </div>
                            <div class="alert alert-warning">
                                <div class="alert-title">¡Atención!</div>
                                <p>Recuerda que esta es una versión de prueba, por lo que no se recomienda su uso en producción.</p>
                            </div>
                            <div class="mt-4">
                                <h4>Posts Recientes</h4>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Titulo</th>
                                                <th>Fecha de Creación</th>
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection