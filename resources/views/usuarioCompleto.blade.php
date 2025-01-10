@extends('layout.app')

@section('content')
    <style>
        h2 {
            text-align: center;
        }

        .principal {
            min-height: 100vh;
        }

        form {
            margin: auto;
        }

        .campo {
            width: 100%;
        }

        input {
            background: none;
            border: none;
            width: 100%;
        }

        select {
            display: inline !important;
        }

        .row {
            margin: 5px 0;
        }

        .tarjeta {
            padding: 0px;
            border: 1px solid black;
        }

        .tarjetainfo {
            border: 1px solid black;
            margin: 0px;

        }
        .titulo{
            background-color: black;
            color: white;
        }

        .botonera div {
            text-align: center;
            padding: auto;
        }
    </style>
    <div class="principal">
        <div class="container">
            @csrf

            <div class="row justify-content-center align-items-center g-2">
                <div class="col-12">
                    <h2>Informacion de usuario</h2>
                </div>


            </div>

            <div class="row justify-content-center align-items-center">
                @foreach ($datos as $dato)
                    <div class="container">
                        <div class="tarjeta">
                            <div class="row justify-content-center align-items-center ">
                                <div class="col-12 col-md-6">Numero de nomina: <b>{{ $dato->id }}</b></div>
                                <div class="col-12 col-md-6">Area: <b>{{ $dato->area }}</b></div>
                            </div>

                            <div class="row justify-content-center align-items-center">

                                <div class="col-12 col-md-6">
                                    Nombre: <b>{{ $dato->name . ' ' . $dato->lastName . ' ' . $dato->lastName2 }}</b>
                                </div>
                                <div class="col-12 col-md-6">
                                    @php
                                        $estado;
                                        if ($dato->activo) {
                                            $estado = 'ACTIVO';
                                        } else {
                                            $estado = 'INACTIVO';
                                        }
                                    @endphp
                                    Estado: <b>{{ $estado }}</b>


                                </div>
                            </div>
                        </div>

                        <div class="row  justify-content-between align-items-between "style="padding:0;">

                            <div class="col-12 col-md-6 tarjeta">
                                <div class="col-12 titulo">
                                    <h2><b>Laptop</b></h2>
                                </div>
                                <div class="col-12 tarjetainfo" style="padding:0 12px;">
                                    <input type="text" name="pass_pc" id="pass_pc"
                                        value="{{ $dato->pass_pc }}"readonly>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 tarjeta">
                                <div class="col-12 titulo">
                                    <h2><b>Kiosco</b></h2>
                                </div>
                                <div class="col-12 tarjetainfo "style="padding:0 12px;">
                                    <input type="text" name="pass_aps" id="pass_aps"
                                        value="{{ $dato->pass_aps }}"readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center tarjeta">
                            <div class="col-12  titulo">
                                <h2 class=""><b>Correo</b></h2>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="" id="" value="{{ $dato->correo }}" readonly>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="pass_correo" id="pass_correo"
                                    value="{{ $dato->pass_correo }}"readonly>
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center tarjeta">
                            <div class="col-12  titulo">
                                <h2 class=""><b>VPN</b></h2>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="" id="" value="{{ $dato->user_vpn }}"readonly>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="pass_vpn" id="pass_vpn" value="{{ $dato->pass_vpn }}"readonly>
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center tarjeta">
                            <div class="col-12  titulo">
                                <h2 class=""><b>Servidor</b></h2>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="" id=""
                                    value="{{ $dato->user_servidor }}"readonly>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="pass_servidor" id="pass_servidor"
                                    value="{{ $dato->pass_servidor }}" readonly>
                            </div>
                        </div>

                        <div class="row justify-content-between align-items-between botonera">

                            <div class="col-4 col-md-2">
                                <a name="" id="" class="btn btn-block btn-success"
                                    href="{{ url()->previous() }}" role="button">Regresar</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endsection
