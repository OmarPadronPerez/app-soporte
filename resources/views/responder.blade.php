@extends('layout.app')

@section('content')
    <style>
        .boton {
            margin: 10px;
        }
    </style>

    <form action="{{ url('/tckActualizar') }}" method="POST"class="container">
        @csrf

        <div class="row justify-content-center align-items-center g-2">
            <a name="" id="" class="btn btn-primary boton flecha" href="{{ url('/historial') }}"
                role="button"><-- Cancelar </a>

                    @foreach ($datos as $dato)
                        <div class="card ">
                            <div class="card-header">

                                <h5><b>Usuario: </b>{{ $dato->Creador_id }}</h5>

                                <h5><b>Falla con: </b>{{ $dato->Falla }}</h5>
                                <div class="mb-3">
                                    <label for="" class="form-label ">
                                        <h5><b>Prioridad</b></h5>
                                    </label>
                                    <select class="form-select form-select-lg" name="prioridad" id="prioridad">
                                        <option value="Normal" selected>Normal</option>
                                        <option value="Baja">Baja</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Critica">Critica</option>
                                    </select>
                                </div>

                            </div>
                            <div class="card-header">
                                <h4><b>Fecha creacion: </b>
                                    {{ date('d/M/y H:i:s', strtotime($dato->created_at)) }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="descripcion">
                                    <h4 class="card-title">Descripcion del problema</h4>
                                    <p class="card-text">
                                        @if ($dato->Detalles)
                                            {{ $dato->Detalles }}
                                        @endif
                                    </p>
                                </div>

                            </div>

                        </div>
                    @endforeach

                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">
                                <h3>Diagnostico tecnico</h3>
                            </label>
                            <textarea class="form-control" name="Diagnostico" id="Diagnostico" rows="3"></textarea>
                        </div>
                    </div>

                    @if (isset($datos[0]->Foto))
                        <x-descargas>
                            @slot('file', $datos[0]->Foto)
                            @slot('id', $dato->Creador_id)
                        </x-descargas>
                        <!--funciones para imagenes,revisar
                                    https://www.honeybadger.io/blog/using-intervention-image-in-laravel/-->
                    @endif

                    <div class="row justify-content-between align-items-start g-2">
                        <h3>Estado</h3>

                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            <input type="radio" class="btn-check " value="En revision" name="Estado" id="btncheck1"
                                autocomplete="off" />
                            <label class="btn btn-outline-primary " for="btncheck1">En revision</label>

                            <input type="radio" class="btn-check" value="Concluido" name="Estado" id="btncheck3"
                                autocomplete="off" />
                            <label class="btn btn-outline-primary" for="btncheck3">Concluido</label>
                        </div>
                    </div>
                    <textarea class="form-control d-none" name="id" id="id" rows="1">{{ $datos[0]->id }}</textarea>

                    <button type="submit" class="btn btn-primary boton">
                        Guardar
                    </button>
        </div>
    </form>
@endsection
