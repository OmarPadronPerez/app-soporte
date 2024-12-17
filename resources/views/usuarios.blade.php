@extends('layout.app')

@section('content')
    <style>
        .container {
            margin-top: 10px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-between align-items-between g-2" style="margin: 10px 0px">
            <div class="col-10 col-lg-3">
                <h2>Usuarios</h2>
            </div>
            <div class="col-2 col-lg-1">
                <a name="" id="" class="btn btn-primary" href="/nuevoUsuario" role="button">Nuevo</a>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">

            @foreach ($datos as $dato)
                @if (!($dato->id == '1'))
                    <x-tarjetaUsuario>
                        @slot('id', $dato->id)
                        @php
                            $nombreCompleto = $dato->name . ' ' . $dato->lastName;
                        @endphp
                        @slot('name', $nombreCompleto)
                        @slot('activo', $dato->activo)
                        @slot('area', $dato->area)
                        @slot('updated_at', $dato->updated_at)
                    </x-tarjetaUsuario>
                @endif
            @endforeach

        </div>

    </div>
@endsection
