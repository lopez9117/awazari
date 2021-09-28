@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <p>Hola que tal</p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <p>Hola que tal</p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <p>Hola que tal</p>
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