@extends('tablar::auth.layout')
@section('title', 'Iniciar sesión')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="#" class="navbar-brand navbar-brand-autodark">
                <img src="{{ asset(config('tablar.auth_logo.img.path', 'assets/logo.svg')) }}" height="36" alt="Logo">
            </a>
        </div>
        <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">Ingresa a tu cuenta</h2>
                <form action="{{ route('login') }}" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Usuario</label>
                        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}" placeholder="Tu usuario" autocomplete="off">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">
                            Contraseña
                            <span class="form-label-description">
                                <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                            </span>
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Tu contraseña" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Mostrar contraseña" data-bs-toggle="tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="2"/>
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                    </svg>
                                </a>
                            </span>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <span class="form-check-label">Recordar mi contraseña en este dispositivo</span>
                        </label>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                    </div>
                </form>
            </div>
            <div class="hr-text">o</div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><a href="#" class="btn btn-white w-100">
                        <!-- Icono de inicio de sesión con GitHub -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              
