@extends('layout.app')

<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">

@section('content')
    <div class="container principal">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h2>Tu Historial</h2>
            </div>
            <div class="col-12">
                @if ($datos)
                    @foreach ($datos as $dato)
                        @php
                            $nombre = $dato->name . ' ' . $dato->lastName;
                        @endphp

                        <x-tarjeta>
                            @slot('id', $dato->id)
                            @slot('usuario', $nombre)
                            @slot('fCreacion', $dato->created_at)
                            @slot('fecha_resuelto',$dato->fecha_resuelto)
                            @slot('Falla', $dato->Falla)
                            @slot('Descripcion', $dato->Detalles)
                            @slot('redirigir', 'tickets/' . $dato->id)
                            @slot('Urgencia', $dato->Urgencia)
                        </x-tarjeta>
                    @endforeach
                @else
                    <h3>sin tikets que mostrar</h3>
                @endif

            </div>
        </div>
    </div>
@endsection
