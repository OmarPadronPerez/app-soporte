<style>
    a{
        text-decoration: none;
    }
</style>

<a href="{{ url('tickets/'.$id) }}" class="card ">
    <div class="container">
        <div class="row justify-content-between align-items-center card-header">
            <div class="col-12 col-md-3">
                <h5>
                    {{$falla}}
                </h5>

            </div>
            <!--
            <div class="col-12 col-md-3 tipo">
                <h6>Gravedad: urgente</h6>
            </div>-->
            <div class="col-12 col-md-2 estado">
                <h5 class="card-text">
                    <b>En revision</b> 
                </h5>
            </div>

        </div>

    </div>


    <div class="card-body">
        <div class="descripcion">
            <h4 class="card-title">Descripcion de problema</h4>
            <p class="card-text">
                {{$descripcion}}
            </p>
        </div>
  <!--
        <div class="diagnostico">
            <h4>Diagnostico tecnico</h4>
            <p class="card-text">
                El usuario esta tonto
            </p>
        </div>
      
        <div class="estado">
            <h5 class="card-text">
                <b>Estado: </b> En revision
            </h5>
        </div>
    -->
    </div>
</a>
