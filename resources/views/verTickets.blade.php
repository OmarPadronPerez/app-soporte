@extends('layout.app')

<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">


@section('content')
    <div class="container principal">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h2>tickets abiertos</h2>
            </div>

            <div class="col-12 ">
                @php
                    $datos2 = [];
                    /*for ($i = 0; $i < count($datos); $i++) {
                        if ($datos[$i]->Urgencia == 'Critica') {
                            array_push($datos2, $datos[$i]);
                            unset($datos[$i]);
                        }
                    }
                    for ($i = 0; $i < count($datos); $i++) {
                        array_push($datos2, $datos[$i]);
                    }
                    $datos = $datos2;*/
                @endphp

                @if ($datos)
                    @foreach ($datos as $dato)
                        @php
                            $nombre = $dato->name . ' ' . $dato->lastName;
                        @endphp

                        <x-tarjeta>
                            @slot('id', $dato->id)
                            @slot('usuario', $nombre)
                            @slot('fCreacion', $dato->created_at)
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
