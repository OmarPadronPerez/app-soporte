@extends('layout.app')

<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">


@section('content')

    <div class="container principal">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h2>Tus tickets activos</h2>
            </div>

            <div class="col-12 ">
                @foreach ($datos as $dato)
                    <x-tarjeta > 
                        @slot('id',$dato->id)
                        @slot('fCreacion',$dato->created_at)
                        @slot('Falla', $dato->Falla)
                        @slot('Descripcion',$dato->Detalles)
                        @slot('redirigir','tickets/'.$dato->id)
                        @slot('Urgencia',$dato->Urgencia)
                    </x-tarjeta>
                @endforeach

            </div>
        </div>

    </div>
@endsection
