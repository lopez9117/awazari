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
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rol</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->id }}</td>
                                        <td>{{ $rol->name }}</td>
                                        <td width="10px">
                                            @can('admin.roles.edit')
                                                <form method="GET" action="{{route('admin.roles.edit')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$rol->id}}">
                                                    <input type="submit" value="Editar" class="btn btn-sm btn-primary">
                                                </form>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('admin.roles.destroy')
                                                <form action="{{route('role.destroy')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$rol->id}}">
                                                    <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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