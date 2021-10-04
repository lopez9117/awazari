@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>Lista de usuarios</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{Route('register-new-users')}}" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row mt-4">
           <div class="col-12">
               <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                             @if(!empty($usuario->getRoleNames()))
                                                 @foreach ($usuario->getRoleNames() as $userRole)
                                                     {{$userRole}}
                                                 @endforeach
                                             @endif
                                        </td>
                                        <td width="10px">
                                            @can('admin.usuarios.edit')
                                                <form action="{{route('admin.usuarios.edit')}}" method="get">
                                                    <input type="hidden" name="id" value="{{ $usuario->id }}">
                                                    <input type="submit" value="Editar" class="btn btn-sm btn-primary">
                                                </form>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('admin.usuarios.destroy')
                                                <form action="{{route('admin.usuarios.destroy')}}" method="get">
                                                    <input type="hidden" value="{{ $usuario->id }}">
                                                    <input type="submit" value="Editar" class="btn btn-sm btn-danger">
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