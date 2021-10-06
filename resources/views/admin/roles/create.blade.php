@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2 class="h4">Formulario de creación de roles</h2>
            </div>
            <div class="col-3 text-right">
                <a href="/roles" class="btn btn-sm btn-dark">Atras</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
               <div class="card">
                   <div class="card-body">
                        {!! Form::open(['route' => 'create-role-new']) !!}
                            <div class="form-group">
                                {!! Form::text('name', null, ['placeholder' => 'Nombre del rol', 'class' => 'form-control']) !!}
                                @error('name')
                                    <small class="text-danger">
                                        {{$message}}
                                    </small>
                                @enderror
                            </div>
                            <h4 class="text-center">Asignar permisos</h4>
                            <div class="form-group row">
                                @foreach ($permissions as $permission)
                                    <div class="col-12 col-md-6">
                                        <label>
                                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1'] ) !!}
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Crear rol" class="btn btn-sm btn-primary">
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