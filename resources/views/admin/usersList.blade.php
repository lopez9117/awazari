@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12">
               <table style="width:100%">
                   <thead>
                       <tr>
                           <th>Nombre</th>
                           <th>Correo</th>
                           <th>Rol</th>
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