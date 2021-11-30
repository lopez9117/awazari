@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Ofertas</h1>
@stop

@section('content')
    <div class="container contentDashboard">
        <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-body">
                    <ul class="content-list-offers">
                        @if ($user->offers)
                            @foreach ($user->offers as $offer)
                                <li class="item-offer">
                                    <div class="offer-item">
                                        <p class="name-offer mb-0">{{$offer->name}}</p>
                                    </div>
                                    <div class="open-offer-item">
                                        @if ($offer->files)
                                            @foreach ($offer->files as $file)
                                                <div class="content-image-offer pt-3 pb-3">
                                                    <img src="/storage/{{$file->file}}" alt="" class="image-offer">
                                                    <div class="content-actions">
                                                        <a href="{{route('show.offer',['id' => $offer->id])}}" class="btn btn-sm btn-dark">Ver</a>
                                                        <a href="{{route('edit.offer',['id' => $offer->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
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