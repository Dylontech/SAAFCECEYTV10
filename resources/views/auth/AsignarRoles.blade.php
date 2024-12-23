@extends('tablar::page')

@section('content')
<div class="container">
    <h2>Asignar Roles a Usuarios</h2>
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
</div>
@endsection