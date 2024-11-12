@extends('layout.app')

@section('content')
    <div style="height: 20px"></div>

    <form action="{{ url('/nuevo/envtkt')}}" method="POST" enctype="multipart/form-data" class="container formulrio">
        @csrf
        <div class="row justify-content-center align-items-center g-2">
            
            <div class="col">
                <h1>¿Tienes problemas? </h1>
            </div>
            <hr>
            <div class="mb-3">
                <label for="ta-descripcion" class="form-label">
                    <h3> ¿Con que tienes problemas? </h3>
                </label>
                <select name="falla" id="falla" class="form-select" aria-label="Default select example">
                    
                    <option value="PC">MI PC</option>
                    <option value="Conexion">LA CONEXION</option>
                    <option value="Accesorios">UN ACCESORIO DE MI PC</option>
                    <option value="Aplicaciones">UNA APLICACION</option>
                    <option value="Servidor">EL SERVIDOR</option>
                    <option value="Otros">OTRA COSA</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ta-descripcion" class="form-label">
                    <h3>Describenos tu falla</h3>
                </label>
                <textarea name="detalles" class="form-control" name="detalles" id="detalles" rows="3"></textarea>
            </div>
            <div class="mb-3" style="display:none">
                <textarea name="user" class="form-control" name="user" id="user" rows="1"> {{Session::get('id')}} </textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">
                    <h3>Muestranos un poco mas</h3>
                </label>
                <br>
                <input name="foto" type="file" name="foto" id="foto">
            </div>

            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
            type="submit">Guardar</button>

        </div>
    </form>

@endsection
