@extends('layout.app')

<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">

@section('content')
    <div class="container principal">
        <div class="row justify-content-center align-items-center g-2">
            @if (isset($mensaje))
                <x-mensajes>
                    @slot('estado', $mensaje['estado'])
                    @slot('titulo', $mensaje['titulo'])
                    @slot('mensaje', $mensaje['mensaje'])
                </x-mensajes>
            @endif

            <div class="col-12">
                <h2>Tu Historial</h2>
            </div>
            <hr>
            <div class="col-12">
                @if ($datos)
                    @foreach ($datos as $dato)
                        @php
                            $nombre = $dato->name . ' ' . $dato->lastName;
                            $redirigir='';
                            if ($dato->fecha_resuelto) {
                                $redirigir = 'completo/' . $dato->id;
                            }else{
                                $redirigir = 'tickets/' . $dato->id;
                            }
                        @endphp

                        <x-tarjeta>
                            @slot('id', $dato->id)
                            @slot('usuario', $nombre)
                            @slot('fCreacion', $dato->created_at)
                            @slot('fecha_resuelto', $dato->fecha_resuelto)
                            @slot('Falla', $dato->Falla)
                            @slot('Descripcion', $dato->Detalles)
                            @slot('redirigir', $redirigir)
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
