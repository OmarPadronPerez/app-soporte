<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">

<style>
    .inactivo {
        background-color: #aeafb4;

    }

    .administrador {
        background-color: #c0ffc9;
    }
</style>

<?php
$estilo = '';
if (!$activo) {
    $estilo .= ' inactivo';
}
if ($tipo) {
    $estilo .= ' administrador';
}

?>



<div class="card {{ $estilo }}">
    <div class="card-header row justify-content-start align-items-start">

        <div class="col-2 col-lg-1">
            ID: <b>{{ $id }}</b>
        </div>

        <div class="col-10 col-lg-11">
            <b>{{ $name_user }}</b>
        </div>

    </div>
    <div class="card-body ">
        <div class="row justify-content-start align-items-start">
            <div class="col-7 col-lg-2">
                Usuario: <b> {{ $name }}</b>
            </div>
            @if ($tipo)
                <div class="col-5 col-lg-3">
                    <b>Administrador</b>
                </div>
            @endif

            @if ($activo)
                <div class="col-12 col-lg-3">
                    Estado: <b>Activo</b>
                </div>
            @else
                <div class="col-12 col-lg-3" style="color: red">
                    Estado: <b>Desactivado</b>
                </div>
            @endif

            @if ($correo)
                <div class="col-12 col-lg-3">
                    correo: <b>{{ $correo }}</b>
                </div>
            @endif

            <div class="col-12 col-lg-12 ">
                Actualizacion:
                <b>{{ date('d/M/y', strtotime($updated_at)) }}</b>
            </div>
        </div>

        <a href="usuarios/{{ $id }}" class="btn btn-primary">Actualizar</a>
    </div>
</div>
