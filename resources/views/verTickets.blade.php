@extends('layout.app')

<style>
    .principal{
        margin-top: 15px
    }
    .card{
        margin-bottom: 20px
    }
</style>

@section('content')
    <div class="container principal">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h1>Tus tickets activos</h1>
            </div>

            <div class="col-12 ">
                @foreach ($datos as $dato)
                    <x-tarjeta>
                        @slot('id',$dato->id)
                        @slot('falla', $dato->falla)
                        @slot('descripcion',$dato->Detalles)

                    </x-tarjeta>
                @endforeach

            </div>
        </div>

    </div>
@endsection
