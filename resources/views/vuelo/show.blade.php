@extends('layouts.app')

@section('template_title')
    {{ $vuelo->name ?? "{{ __('Show') Vuelo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Vuelo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('Vuelo.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $vuelo->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $vuelo->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
