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
                        <form action="{{route('store.offer')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{auth::user()->id}}">
                            <div class="section-name-image-description">
                                @include('admin.oferta.formSections.name-file-description')
                                <div class="form-group text-right">
                                    <button class="btn btn-sm btn-dark" id="next-form-offer">Siguiente</button>
                                </div>
                            </div>
                            <div class="section-price-location">
                                @include('admin.oferta.formSections.price-location')
                                <div class="form-group text-center mt-4">
                                    <button class="btn btn-sm btn-dark mr-5" id="back-form-offer">Atras</button>
                                    <input type="submit" value="Guardar" id="submit-offer" class="btn btn-sm btn-dark">
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