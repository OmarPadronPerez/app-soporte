@extends('layout.app')

<style>
    .principal{
        margin-top: 15px
    }
    .card{
        margin-bottom: 20px
    }
</style>

{{$datos}}
@section('content')
    <div class="container principal">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <h1>Tus tickets activos</h1>
            </div>

            <div class="col-12 ">
                {{
                    if($dato->created_at!=null)
                        $dato->created_at=null;
                    
                }}
                @foreach ($datos as $dato)
                    <x-tarjeta> 
                        @isset(slot('id',$dato->id))
                        @slot('fCreacion',$dato->created_at)
                        @slot('Falla', $dato->Falla)
                        @slot('Descripcion',$dato->Detalles)
                        @slot('redirigir','tickets/'.$dato->id)
                    </x-tarjeta>
                @endforeach

            </div>
        </div>

    </div>
@endsection
