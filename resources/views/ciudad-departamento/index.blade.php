@extends('layouts.app')

@section('template_title')
    Ciudad Departamento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ciudad Departamento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ciudad-departamentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Ciudad Id</th>
										<th>Departamento Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ciudadDepartamentos as $ciudadDepartamento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ciudadDepartamento->ciudad_id }}</td>
											<td>{{ $ciudadDepartamento->departamento_id }}</td>

                                            <td>
                                                <form action="{{ route('ciudad-departamentos.destroy',$ciudadDepartamento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ciudad-departamentos.show',$ciudadDepartamento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ciudad-departamentos.edit',$ciudadDepartamento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ciudadDepartamentos->links() !!}
            </div>
        </div>
    </div>
@endsection
