@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2 class="h4">Formulario para editar usuario</h2>
            </div>
            <div class="col-3 text-right">
                <a href="/usuarios" class="btn btn-sm btn-dark">Atras</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
               <div class="card">
                   <div class="card-body">
                    {!! Form::model($user, ['method' => 'PUT','route' => ['admin.usuarios.update']]) !!}
                    {!! Form::hidden('id', $user->id) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::text('name', null, array('placeholder' => 'name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::password('password', array('placeholder' => 'password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <h4>Selecciona uno o más roles</h4>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                @foreach ($roles as $value)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <label>{{ Form::checkbox('role[]', $value->id, in_array($value->id, $userRole) ? true : false, array('class' => 'name mr-1')) }}
                                                {{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
                        </div>
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