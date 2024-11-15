@extends('layout.app')

@section('content')
    
    <div class="container principal">
        <div style="margin-top: 20px"></div>
        <a name="" id="" class="btn btn-primary" href="{{url('/historial')}}" role="button"><- regresar</a>
        <div class="row justify-content-center align-items-center g-2">
            
            <div class="card ">
                @foreach ($datos as $dato)
                    <div class="card-header">

                        <h4><b>Usuario: </b>{{ $dato->User }}</h4>

                        <h4><b>Falla con: </b>{{ $dato->Falla }}</h4>

                        <h4><b>Estado: </b>
                            @if ($dato->fecha_resuelto)
                                cerrado
                            @else
                                En revisión
                            @endif
                        </h4>

                    </div>
                    <div class="row card-header justify-content-between align-items-center">
                        <div class="col-12 col-lg-5">
                            <h5>
                                <b>Creacion: </b>{{ $dato->created_at }}
                            </h5>

                        </div>
                        <div class="col-12 col-lg-5 estado">
                            <h5 class="card-text">
                                <b>Cierre: </b>
                                {{ $dato->fecha_resuelto }}

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
                    <div class="col-12 col-md-5 imagen">
                        <img src="image source" class="img-fluid rounded-top" alt="" />

                    </div>
                @endforeach
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="form-label">
                        <h3>Diagnostico tecnico</h3>
                    </label>
                    <textarea readonly class="form-control" name="Diagnostico" id="Diagnostico" rows="3"></textarea>
                </div>
            </div>
            <textarea class="form-control d-none" name="id" id="id" rows="1">{{ $datos[0]->id }}</textarea>
            <div class="espacio" style="height: 20px"></div>

        </div>
    </div>
@endsection
