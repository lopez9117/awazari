@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop

@section('content_header')
<h1>{{$offerDescription->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-5">
                    @if ($offerDescription->files)
                        @foreach ($offerDescription->files as $file)
                            <img src="/storage/{{$file->file}}" width="100%">
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-lg-7">
                    <div class="row content-track">
                        <div class="col-12 col-lg-6 text-center">
                            <h5 class="title-track"><span>Aperturas</span></h5>
                            <div class="content-track">

                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-center">
                            <h5 class="title-track"><span>Negociaciones</span></h5>
                            <div class="content-track">

                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h5>Descripción</h5>
                            <p>{{$offerDescription->description}}</p>
                        </div>
                        <div class="col-12 col-lg-4">
                            <p><strong>Precio:</strong> $ {{$offerDescription->price}}</p>
                        </div>
                        <div class="col-12 col-lg-8">
                            <p>
                                <strong>Clasificación:</strong>
                                @if ($offerDescription->lines)
                                    @foreach ($offerDescription->lines as $line)
                                        {{$line->line}}
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <a href="{{route('index.offer')}}" class="btn btn-sm btn-dark">Atras</a>
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