@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Crear oferta</h1>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12 col-md-8 offset-md-2 col-lg-6-offset-lg-3">
               <div class="card">
                   <div class="card-body">
                        <p class="text-danger">Todos los campos son obligatorios</p>
                        <form action="" method="post">
                            @csrf
                            <div class="section-name-image-description">
                                @include('admin.oferta.formSections.name-file-description')
                                <div class="form-group text-right">
                                    <a href="" class="btn btn-sm btn-dark" id="next-form-offer">Siguiente</a>
                                </div>
                            </div>
                            <div class="section-price-location">
                                @include('admin.oferta.formSections.price-location')
                                <div class="form-group text-center mt-4">
                                    <a href="" class="btn btn-sm btn-dark mr-5" id="back-form-offer">Atras</a>
                                    <input type="submit" value="Guardar" class="btn btn-sm btn-dark">
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
    <script src="{{ asset('js/offer.js') }}"></script>
@stop