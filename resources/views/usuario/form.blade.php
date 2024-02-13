<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $usuario->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vuelo_id') }}
            {{ Form::text('vuelo_id', $usuario->vuelo_id, ['class' => 'form-control' . ($errors->has('vuelo_id') ? ' is-invalid' : ''), 'placeholder' => 'Vuelo Id']) }}
            {!! $errors->first('vuelo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pais_id') }}
            {{ Form::text('pais_id', $usuario->pais_id, ['class' => 'form-control' . ($errors->has('pais_id') ? ' is-invalid' : ''), 'placeholder' => 'Pais Id']) }}
            {!! $errors->first('pais_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('departamento_id') }}
            {{ Form::text('departamento_id', $usuario->departamento_id, ['class' => 'form-control' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => 'Departamento Id']) }}
            {!! $errors->first('departamento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ciudad_id') }}
            {{ Form::text('ciudad_id', $usuario->ciudad_id, ['class' => 'form-control' . ($errors->has('ciudad_id') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad Id']) }}
            {!! $errors->first('ciudad_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>