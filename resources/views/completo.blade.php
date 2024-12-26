@extends('layout.app')

@section('content')
    <div class="container principal">
        <a name="" id="" class="btn btn-primary col-12 col-md-2" href="{{ url('/historial') }}" role="button"
            style="margin: 10px 0;"><--regresar </a>
                <div class="row justify-content-center align-items-center g-2">

                    <div class="card ">
                        @foreach ($datos as $dato)
                            <div class="card-header">

                                <h4><b>Usuario: </b>{{ $dato->name . ' ' . $dato->lastName }}</h4>

                                <h4><b>Falla con: </b>{{ $dato->Falla }}</h4>

                                <h4><b>Estado: </b>
                                    @if ($dato->fecha_resuelto)
                                        Cerrado
                                    @else
                                        En revisión
                                    @endif
                                </h4>

                            </div>
                            <div class="row card-header justify-content-between align-items-center">
                                <div class="col-12 col-lg-5">
                                    <h5>
                                        <b>Creacion: </b>{{ date('d/M/y H:i:s', strtotime($dato->created_at)) }}
                                    </h5>

                                </div>
                                <div class="col-12 col-lg-5 estado">
                                    <h5 class="card-text">
                                        @if ($dato->fecha_resuelto)
                                            <b>Cierre: </b>{{ date('d/M/y H:i:s', strtotime($dato->fecha_resuelto)) }}
                                        @else
                                            Cierre:
                                        @endif

                                    </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="descripcion">
                                    <h4 class="card-title">Descripcion del problema</h4>
                                    <p class="card-text">
                                        {{ $dato->Detalles }}
                                    </p>
                                </div>
                            </div>
                            @if (isset($datos[0]->Archivo))
                                <x-descargas>
                                    @slot('file', $datos[0]->Archivo)
                                    @slot('id', $dato->Creador_id)
                                </x-descargas>
                                <!--funciones para imagenes,revisar
                                        https://www.honeybadger.io/blog/using-intervention-image-in-laravel/-->
                            @endif
                        @endforeach
                    </div>


                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">
                                <h3>Diagnostico tecnico</h3>
                            </label>
                            <textarea readonly class="form-control" name="Diagnostico" id="Diagnostico" rows="3">
@if ($dato->Diagnostico)
{{ $dato->Diagnostico }}
@endif
</textarea>
                        </div>
                    </div>
                   
                    <textarea class="form-control d-none" name="id" id="id" rows="1" hidden>{{ $datos[0]->id }}</textarea>
                    <div class="espacio" style="height: 20px"></div>

                </div>
    </div>
@endsection
