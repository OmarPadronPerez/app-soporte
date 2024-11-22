@extends('layout.app')

@section('content')

<style>
    .container{
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

        <div class="row justify-content-center align-items-center g-2">

            @foreach ($datos as $dato)
                <x-tarjetaUsuario>
                    @slot('id', $dato->id)
                    @slot('name', $dato->name)
                    @slot('name_user', $dato->name_user)
                    @slot('activo', $dato->activo)
                    @slot('tipo', $dato->tipo)
                    @slot('updated_at', $dato->updated_at)
                    @slot('correo',$dato->correo)

                </x-tarjetaUsuario>
            @endforeach

        </div>

    </div>
@endsection
