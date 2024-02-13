@extends('layouts.app')

@section('template_title')
    {{ $departamentoPai->name ?? "{{ __('Show') Departamento Pai" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Departamento Pai</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departamento-pais.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $departamentoPai->departamento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pais Id:</strong>
                            {{ $departamentoPai->pais_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
