@extends('tablar::page')


@section('content')
<div class="page-header d-print-none">
<div class="container">
    <div class="row g-2 align-items-center">
        <div class="col">
            <div class="page-body">
                <div class="container-xl">
                    @if(config('tablar','display_alert'))
                        @include('tablar::common.alert')
                    @endif
                    <div class="row row-deck row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Asignar Roles a Usuarios</h3>
                                </div>
  
    <form action="{{ route('asignar.roles') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user">Usuario</label>
            <select name="user_id" id="user" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select name="role_id" id="role" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar Rol</button>
    </form>

    <h2 class="mt-5">Lista de Usuarios</h2>
    <a href="{{ route('altausuarios.form') }}" class="btn btn-success mb-3">Dar de Alta Usuario</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo de usuario</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->User_tipo }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
        </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection