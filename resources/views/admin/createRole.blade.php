@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Formulario de creación de roles</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
               <form method="POST" action="{{ route('create-role-new') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="text" name="name" class="nameRoleInput">
                            <input type="hidden" name="guard_name" value="Web">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="submit" value="Crear" class="btn btn-success">
                        </div>
                    </div>
               </form>
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