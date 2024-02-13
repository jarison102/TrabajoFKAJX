@extends('layouts.app')

@section('template_title')
    {{ $ciudadDepartamento->name ?? "{{ __('Show') Ciudad Departamento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ciudad Departamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ciudad-departamentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ciudad Id:</strong>
                            {{ $ciudadDepartamento->ciudad_id }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $ciudadDepartamento->departamento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
