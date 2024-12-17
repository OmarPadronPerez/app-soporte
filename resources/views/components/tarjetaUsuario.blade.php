<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">

<style>
    .inactivo {
        background-color: #aeafb4;

    }

    .administrador {
        background-color: #c0ffc9;
    }
    a{
        text-decoration: none;
        color: black;
    }
</style>

@php
    $estilo = '';
    if (!$activo) {
        $estilo .= ' inactivo';
    }
    if ($area == 'SOPORTE') {
        $estilo .= ' administrador';
    }
@endphp


<a href="usuarios/{{ $id }}">
    <div class="card {{ $estilo }}">
        <div class="card-header row justify-content-start align-items-start">

            <div class="col-4 col-lg-1">
                ID: <b>{{ $id }}</b>
            </div>

            <div class="col-10 col-lg-11">
                <b>{{ $name }}</b>
            </div>

        </div>
        <div class="card-body ">
            <div class="row justify-content-start align-items-start">
                <div class="col-12 col-lg-12">
                    Usuario: <b> {{ $name }}</b>
                </div>
                <div class="col-7 col-lg-3 ">
                    Area: <b>{{ $area }}</b>
                </div>
                

                @if ($activo)
                    <div class="col-6 col-lg-3">
                        Estado: <b>Activo</b>
                    </div>
                @else
                    <div class="col-6 col-lg-3" style="color: red">
                        Estado: <b>Desactivado</b>
                    </div>
                @endif

                <div class="col-12 col-lg-12 ">
                    Actualizacion:
                    <b>{{ date('d/M/y', strtotime($updated_at)) }}</b>
                </div>
            </div>

        </div>
    </div>
</a>
