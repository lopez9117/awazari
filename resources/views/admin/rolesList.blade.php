@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Roles</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{Route('create-role')}}" class="btn btn-primary">Crear Rol</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12">
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Permisos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            <tr>
                                <td>{{ $rol->name }}</td>
                                <td>{{ $rol->guard_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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