<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Matricula') }}</label>
    <div>
        {{ Form::text('Matricula', $alumno->Matricula, ['class' => 'form-control' .
        ($errors->has('Matricula') ? ' is-invalid' : ''), 'placeholder' => 'Matricula']) }}
        {!! $errors->first('Matricula', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>Matricula</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('CURP') }}</label>
    <div>
        {{ Form::text('CURP', $alumno->CURP, ['class' => 'form-control' .
        ($errors->has('CURP') ? ' is-invalid' : ''), 'placeholder' => 'Curp']) }}
        {!! $errors->first('CURP', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>CURP</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Carrera') }}</label>
    <div>
        {{ Form::select('Carrera', ['NA' => 'NA', 'Diseño Grafico Digital' => 'Diseño Grafico Digital', 'Produccion Industrial de Alimentos' => 'Produccion Industrial de Alimentos', 'Ventas' => 'Ventas'], $alumno->Carrera, ['class' => 'form-control' .
        ($errors->has('Carrera') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una carrera']) }}
        {!! $errors->first('Carrera', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>Carrera</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Semestre') }}</label>
    <div>
        {{ Form::select('Semestre', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], null, ['class' => 'form-control' .
        ($errors->has('Semestre') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un semestre']) }}
        {!! $errors->first('Semestre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>Semestre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Grupo') }}</label>
    <div>
        {{ Form::select('Grupo', ['24' => '24', '28' => '28', '29a' => '29a', '29b' => '29b', '29c' => '29c'], null, ['class' => 'form-control' .
        ($errors->has('Grupo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un grupo']) }}
        {!! $errors->first('Grupo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>Grupo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Nombre') }}</label>
    <div>
        {{ Form::text('Nombre', $alumno->Nombre, ['class' => 'form-control' .
        ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>Nombre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('email') }}</label>
    <div>
        {{ Form::text('email', $alumno->email, ['class' => 'form-control' .
        ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>email</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('estatus') }}</label>
    <div>
        {{ Form::select('estatus', ['activo' => 'Activo', 'termino' => 'Termino', 'baja' => 'Baja'], $alumno->estatus, ['class' => 'form-control' .
        ($errors->has('estatus') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un estatus']) }}
        {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">alumno <b>estatus</b> instruction.</small>
    </div>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="#" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
        </div>
    </div>
</div>