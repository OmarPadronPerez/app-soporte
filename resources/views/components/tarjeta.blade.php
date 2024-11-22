<link type="text/css" href="{{ asset('css/estilos.css') }}" rel="stylesheet">

<a href="{{ url($redirigir) }}" class="card ">
    <div class="container">
        <div class="row justify-content-between align-items-center card-header">
            <div class="col-12 col-md-3">
                <h5>
                    <b>Falla con: </b>{{$Falla}}
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
            <div class="col-12 col-md-5">
                <h5>
                    <b>Creacion: </b>{{date('d/M/y H:i:s', strtotime($fCreacion))}}
                    
                </h5>

            </div>  
            <div class="col-12 col-md-5 estado">
                <h5 class="card-text">
                    @if (isset($fCierre))
                        <b>Cierre: </b>
                        {{date('d/M/y H:i:s', strtotime($fCierre))}}
                    @endif
                    
                </h5>
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="descripcion">
            <h4 class="card-title">Descripcion de problema</h4>
            <p class="card-text">
                {{$Descripcion}}
            </p>
        </div>
    </div>
</a>
