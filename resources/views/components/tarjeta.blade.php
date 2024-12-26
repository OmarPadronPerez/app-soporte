<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('css/tarjetaticket.css') }}" rel="stylesheet">

<a href="{{ url($redirigir) }}" class="card {{ $Urgencia }}">


    <div class="container ">
        <div class="row justify-content-between align-items-center card-header titulo">
            <div class="col-12">
                <h5><b>Usuario: </b>{{ $usuario }}</h5>
            </div>
            <div class="col-12 col-md-3 ">

                <h5>
                    <b>Falla con: </b>{{ $Falla }}
                </h5>

            </div>
            <div class="col-12 col-md-5 estado">
                <h5 class="card-text">
                    <b>Estado:</b>
                    @if (isset($fCierre))
                        Cerrado
                    @else
                        En revision
                    @endif

                </h5>
            </div>
        </div>
        <div class="row justify-content-between align-items-center card-header">
            <div class="col-12 col-lg-6">
                <h5>
                    <b>Creacion: </b>{{ date('d/M/y H:i:s', strtotime($fCreacion)) }}
                </h5>

            </div>
            @if ( isset($fCierre) )
                <div class="col-12 col-md-5 estado">
                    <h5 class="card-text">
                        <b>Cierre: </b>
                        {{ date('d/M/y H:i:s', strtotime($fCierre)) }}


                    </h5>
                </div>  
            @endif

        </div>

    </div>

    <div class="card-body">
        <div class="descripcion">
            <h4 class="card-title">Descripcion de problema</h4>
            <p class="card-text">
                {{ $Descripcion }}
            </p>
        </div>
    </div>
</a>
