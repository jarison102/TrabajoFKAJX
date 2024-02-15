<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $usuario->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vuelo_id','Vuelo') }}
            {{ Form::select('vuelo_id', $Vuelo, $usuario->vuelo_id, ['class' => 'form-control' . ($errors->has('vuelo_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el Codigo de vuelo']) }}
            {!! $errors->first('vuelo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('pais_id','Paises') }}
            {{ Form::select('pais_id', $Paises, $usuario->pais_id, ['id' => 'pais_id', 'class' => 'form-control' . ($errors->has('pais_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un país']) }}
        </div>

        <div class="form-group" id="ciudad_field">
            {{ Form::label('ciudad_id', 'Ciudad') }}
            {{ Form::select('ciudad_id', [], null, ['class' => 'form-control' . ($errors->has('ciudad_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una ciudad']) }}
            {!! $errors->first('ciudad_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            {{ Form::label('departamento_id','Departamentos') }}
            {{ Form::select('departamento_id',$Departamentos, $usuario->departamento_id, ['class' => 'form-control' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un Departamento']) }}
            {!! $errors->first('departamento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>



    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pais_id').change(function() {
            var paisId = $(this).val();
            if (paisId === '5') { // Si se selecciona Colombia
                $.ajax({
                    url: '/obtener-ciudades',
                    type: 'GET',
                    data: {
                        pais_id: paisId
                    },
                    success: function(response) {
                        $('#ciudad_id').empty(); // Vaciar el select de ciudades
                        $.each(response, function(key, value) {
                            $('#ciudad_id').append('<option value="' + value.id + '">' + value.nombre + '</option>'); // Agregar opciones de ciudades
                        });
                    },
                    error: function() {
                        console.log('Error al obtener las ciudades.');
                    }
                });
            } else {
                $('#ciudad_id').empty(); // Si no se selecciona Colombia, vaciar el select de ciudades
            }
        });
    });
</script>