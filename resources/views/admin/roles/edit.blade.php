@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($role, ['method' => 'PUT','route' => ['roles.update']]) !!}
                                <div class="form-group">
                                    {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
                                    {!! Form::hidden('id', $role->id) !!}
                                </div>
                                <h4 class="text-center">Asignar permisos</h4>
                                <div class="form-group row">
                                    @foreach($permission as $value)
                                        <div class="col-12 col-md-6">
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name mr-1')) }}
                                            {{ $value->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop