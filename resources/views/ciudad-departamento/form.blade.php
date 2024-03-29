<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ciudad_id') }}
            {{ Form::text('ciudad_id', $ciudadDepartamento->ciudad_id, ['class' => 'form-control' . ($errors->has('ciudad_id') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad Id']) }}
            {!! $errors->first('ciudad_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departamento_id') }}
            {{ Form::text('departamento_id', $ciudadDepartamento->departamento_id, ['class' => 'form-control' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => 'Departamento Id']) }}
            {!! $errors->first('departamento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>