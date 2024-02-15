@extends('layouts.app')

@section('template_title')
    {{ $usuario->name ?? "{{ __('Show') Usuario" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Usuario.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $usuario->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Vuelo Id:</strong>
                            {{ $usuario->vuelo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pais Id:</strong>
                            {{ $usuario->pais_id }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $usuario->departamento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad Id:</strong>
                            {{ $usuario->ciudad_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
