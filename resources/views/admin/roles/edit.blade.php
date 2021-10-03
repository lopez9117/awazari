@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
               <div class="card">
                   <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" name="name" class="form-control" value="{{ $rol->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            @foreach ($permissions as $permission)
                                <div class="col-12 col-md-6">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                    <span>{{ $permission->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </form>
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