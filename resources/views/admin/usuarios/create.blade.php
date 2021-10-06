@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2 class="h4">Formulario de registro de nuevo usuario</h2>
            </div>
            <div class="col-3 text-right">
                <a href="/usuarios" class="btn btn-sm btn-dark">Atras</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row mt-4">
           <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('new-user') }}">
                            @csrf
                            <div class="form-group row mt-4">
                                <div class="col-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre">
        
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo">
        
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma contraseña">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <h4>Selecciona uno o más roles</h4>
                                </div>
                                <div class="form-group row optionsRoleFormRegisterUSers">
                                    @foreach ($roles as $rol)
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <label>
                                                <input type="checkbox" name="roles[]" value="{{ $rol->id }}" class="mr-1">
                                                {{ $rol->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
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