<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Materia_Nombre') }}</label>
    <div>
        {{ Form::text('Materia_Nombre', $materia->Materia_Nombre, ['class' => 'form-control' .
        ($errors->has('Materia_Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Materia Nombre']) }}
        {!! $errors->first('Materia_Nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">materia <b>Materia_Nombre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Materia_profesor') }}</label>
    <div>
        {{ Form::select('Materia_profesor', $profesores->pluck('Nombre', 'id'), null, ['class' => 'form-control' .
        ($errors->has('Materia_profesor') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un profesor']) }}
        {!! $errors->first('Materia_profesor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">materia <b>Materia_profesor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('Materia_tipo') }}</label>
    <div>
        {{ Form::select('Materia_tipo', ['Tronco Común' => 'Tronco Común', 'Especialidad' => 'Especialidad'], $materia->Materia_tipo, ['class' => 'form-control' .
        ($errors->has('Materia_tipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de materia']) }}
        {!! $errors->first('Materia_tipo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">materia <b>Materia_tipo</b> instruction.</small>
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

