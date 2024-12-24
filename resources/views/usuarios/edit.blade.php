@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="User_name">Nombre de Usuario</label>
            <input type="text" name="User_name" id="User_name" class="form-control" value="{{ $user->User_name }}">
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
        <div class="form-group">
            <label for="User_pass">Contraseña</label>
            <input type="password" name="User_pass" id="User_pass" class="form-control">
        </div>
        <div class="form-group">
            <label for="User_pass_confirmation">Confirmar Contraseña</label>
            <input type="password" name="User_pass_confirmation" id="User_pass_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>
@endsection