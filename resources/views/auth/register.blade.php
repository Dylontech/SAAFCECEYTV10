@extends('tablar::auth.layout')
@section('title', 'Registrarse')
@section('content')
    <div class="container container-tight py-4">
        <div class="text-center mb-1 mt-5">
            <a href="" class="navbar-brand navbar-brand-autodark">
                <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36" alt="Logo">
            </a>
        </div>
        <form class="card card-md" action="{{ route('register') }}" method="post" autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Crear una cuenta nueva</h2>
                
                <!-- Nombre -->
                <div class="mb-3">
                      <label class="form-label">Nombre</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Introduce tu nombre" value="{{ old('name') }}">
                      @error('name')
                       <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                </div>
                <!-- Nombre de usuario -->
                <div class="mb-3">
                    <label class="form-label">Nombre de usuario</label>
                    <input type="text" name="User_name" class="form-control @error('User_name') is-invalid @enderror" placeholder="Introduce un nombre de usuario" value="{{ old('User_name') }}">
                    @error('User_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tipo de usuario -->
                <div class="mb-3">
                    <label class="form-label">Tipo de usuario</label>
                    <select name="User_tipo" class="form-select @error('User_tipo') is-invalid @enderror">
                        <option value="">Selecciona un tipo de usuario</option>
                        <option value="admin" {{ old('User_tipo') == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="control_escolar" {{ old('User_tipo') == 'control_escolar' ? 'selected' : '' }}>Control Escolar</option>
                        <option value="financiero" {{ old('User_tipo') == 'financiero' ? 'selected' : '' }}>Departamento Financiero</option>
                        <option value="alumno" {{ old('User_tipo') == 'alumno' ? 'selected' : '' }}>Alumno</option>
                    </select>
                    @error('User_tipo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="User_pass" class="form-control @error('User_pass') is-invalid @enderror" placeholder="Introduce tu contraseña" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Mostrar contraseña" data-bs-toggle="tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                </svg>
                            </a>
                        </span>
                        @error('User_pass')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Confirmar contraseña -->
                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="User_pass_confirmation" class="form-control @error('User_pass_confirmation') is-invalid @enderror" placeholder="Confirmar contraseña" autocomplete="off">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Mostrar contraseña" data-bs-toggle="tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="12" cy="12" r="2"/>
                                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                                </svg>
                            </a>
                        </span>
                        @error('User_pass_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Aceptar términos y condiciones -->
                <div class="mb-3">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" name="terms" required>
                        <span class="form-check-label">Acepto los <a href="#" tabindex="-1">términos y condiciones</a>.</span>
                    </label>
                </div>

                <!-- Botón de enviar -->
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Crear cuenta</button>
                </div>
            </div>
        </form>

        <!-- Enlace a iniciar sesión si ya tienen cuenta -->
        <div class="text-center text-muted mt-3">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" tabindex="-1">Iniciar sesión</a>
        </div>
    </div>
@endsection
