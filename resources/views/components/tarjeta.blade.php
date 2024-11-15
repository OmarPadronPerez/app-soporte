<style>
    a{
        text-decoration: none;
    }
</style>


<a href="{{ url($redirigir) }}" class="card ">
    <div class="container">
        <div class="row justify-content-between align-items-center card-header">
            <div class="col-12 col-md-3">
                <h5>
                    <b>Falla con: </b>{{$Falla}}
                </h5>

            </div>
            <!--
            <div class="col-12 col-md-3 tipo">
                <h6>Gravedad: urgente</h6>
            </div>-->
            <div class="col-12 col-md-2 estado">
                <h5 class="card-text">
                    <b>Estado:</b>
                    @if ($fCierre)
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
                    <b>Creacion: </b>{{$fCreacion}}
                </h5>

            </div>  
            <div class="col-12 col-md-5 estado">
                <h5 class="card-text">
                    <b>Cierre: </b>
                    @if ($fCierre!=null)
                        {{$fCierre}}
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
