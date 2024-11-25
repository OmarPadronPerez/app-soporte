@extends('layout.app')
@section('content')
    <style>
        .btn-excel {
            background-color: #10793f;
            border: none
        }

        .botones {
            margin: auto 0;
        }

        .botones a {
            margin: 0 10px;
        }

        .fechas input {
            margin: 0 10px
        }

        form div {
            margin: auto 0;
        }
    </style>
    <script></script>
    <div class="container">

        <div class="row justify-content-center align-items-center g-2">
            <h2 class="col">Reportes</h2>
        </div>

        <form class="row  g-2" action="{{ url('verReportes') }}" style="margin: auto">
            @csrf
            <div class="col-auto fechas">
                Reporte de
                <input type="date" id="inicio" name="inicio">
                a
                <input type="date" id="fin" name="fin">
            </div>

            <div class="col-auto botones">
                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>

                    <a name="" id="" class="btn btn-primary btn-excel" href="#" role="button">Exportar a
                        excel</a>

                </div>

            </form>



            {{ $datos }}


            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Falla</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Resuelto por</th>
                                    <th scope="col">Urgencia</th>
                                    <th scope="col">Fecha de inicio</th>
                                    <th scope="col">Fecha de cierre</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($datos as $dato)
                    @php
                        $estilo = '';
                        if (!$dato->fecha_resuelto) {
                            $estilo = 'table-warning';
                        }
                    @endphp

                    <tr class="{{ $estilo }}">
                        <td scope="row">{{ $dato->id }}</td>
                        <td>{{ $dato->Creador_id }}</td>
                        <td>{{ $dato->Falla }}</td>
                        <td>{{ $dato->Detalles }}</td>
                        <td>{{ $dato->resuelto_id }}</td>
                        <td>{{ $dato->Urgencia }}</td>
                        <td>{{ $dato->created_at }}</td>
                        <td>{{ $dato->fecha_resuelto }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
    </div>
    </div>
    </div>
@endsection
