@extends('tablar::auth.layout')
@section('title', 'Iniciar sesión')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36" alt="Logo">
            </a>
        </div>
        <form class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Ingresa a tu cuenta</h2>
                
                <!-- Nombre de usuario -->
                <div class="mb-3">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" name="User_name" class="form-control @error('User_name') is-invalid @enderror" placeholder="Introduce tu nombre de usuario" value="{{ old('User_name') }}">
                    @error('User_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="User_pass" class="form-control @error('User_pass') is-invalid @enderror" placeholder="Introduce tu contraseña" autocomplete="off">
                    @error('User_pass')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de enviar -->
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </div>
            </div>
        </form>

        <!-- Enlace a registrarse si no tienen cuenta -->
        <div class="text-center text-muted mt-3">
            ¿No tienes cuenta? <a href="{{ route('register') }}" tabindex="-1">Registrarse</a>
        </div>
    </div>
@endsection