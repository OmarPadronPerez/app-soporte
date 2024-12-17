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
            margin 0;

        }
    </style>
    <div class="principal">
        <form action="{{ url('/gUsuario') }}" method="POST"class="container">
            @csrf

            <div class="row justify-content-center align-items-center g-2">
                <div class="col-10">
                    <h2>Usuario</h2>
                </div>
                <div class="col-1">
                    <img
                        src="https://www.flaticon.es/icono-gratis/pdf_337946?term=pdf&page=1&position=1&origin=tag&related_id=337946"
                        class="img-fluid rounded-top"
                        alt=""
                    />
                    

                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                @foreach ($datos as $dato)
                    <form class="container">
                        <div class="tarjeta">
                            <div class="row justify-content-center align-items-center ">
                                <div class="col">Numero de nomina: <b>{{ $dato->id }}</b></div>
                                <div class="col">Area: <b>{{ $dato->area }}</b></div>
                            </div>

                            <div class="row justify-content-center align-items-center">

                                <div class="col-12 col-md-6">
                                    Nombre: <b>{{ $dato->name . ' ' . $dato->lastName . ' ' . $dato->lastName2 }}</b>
                                </div>
                                <div class="col-12 col-md-6">
                                    <select name="activo" id="activo" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1">ACTIVO</option>
                                        <option value="0">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row  justify-content-between align-items-between "style="padding:0;">

                            <div class="col-12 col-md-6 tarjeta">
                                <div class="col-12 ">
                                    <h2><b>Laptop</b></h2>
                                </div>
                                <div class="col-12 tarjetainfo" style="padding:0 12px;">
                                    <input type="text" name="pass_pc" id="pass_pc" value="{{ $dato->pass_pc }}">
                                </div>
                            </div>

                            <div class="col-12 col-md-6 tarjeta">
                                <div class="col-12 ">
                                    <h2><b>Kiosco</b></h2>
                                </div>
                                <div class="col-12 tarjetainfo "style="padding:0 12px;">
                                    <input type="text" name="pass_aps" id="pass_aps" value="{{ $dato->pass_aps }}">
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
                                <input type="text" name="pass_correo" id="pass_correo" value="{{ $dato->pass_correo }}">
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center tarjeta">
                            <div class="col-12  titulo">
                                <h2 class=""><b>VPN</b></h2>
                            </div>
                            @php
                                $contrasena = $dato->pass_vpn;
                            @endphp
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="" id="" value="{{ $dato->user_vpn }}"readonly>
                            </div>
                            <div class="col-12 col-md-6 tarjetainfo">
                                <input type="text" name="pass_vpn" id="pass_vpn" value="{{ $dato->pass_vpn }}">
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
                                    value="{{ $dato->pass_servidor }}">
                            </div>
                        </div>

                        <input type="text" name="id" id="id" value="{{ $dato->id }}" hidden>

                        <div class="row justify-content-between align-items-between">
                            <div class="col-3 col-md-2">
                                <button type="submit" class="btn btn-block btn-danger">
                                    Guardar
                                </button>
                            </div>
                            <div class="col-2">
                                <a name="" id="" class="btn btn-block btn-primary"
                                    href="{{ url()->previous() }}" role="button">Regresar</a>

                            </div>
                        </div>

                    </form>
                @endforeach
            </div>
        </form>
    </div>






    </div>
@endsection
