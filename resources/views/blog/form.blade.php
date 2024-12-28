
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('title') }}</label>
    <div>
        {{ Form::text('title', $blog->title, ['class' => 'form-control' .
        ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">blog <b>title</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('content') }}</label>
    <div>
        {{ Form::text('content', $blog->content, ['class' => 'form-control' .
        ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content']) }}
        {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">blog <b>content</b> instruction.</small>
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
