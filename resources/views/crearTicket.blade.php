@extends('layout.app')

@section('content')
<style>
    form{
        margin-bottom: 20px;
    }
</style>

    <form action="{{ url('/nuevo/envtkt') }}" method="POST" enctype="multipart/form-data" class="container formulrio">
        @csrf
        <div class="row justify-content-center align-items-center g-2">

            <div class="col">
                <h1>¿Tienes problemas? </h1>
            </div>
            <hr>

            @if (Session::get('tipo') == 1)
                <div class="mb-3">
                    <h3> Usuarios </h3>
                    <select name="usuario2" id="usuario2" class="form-select" aria-label="Default select example">
                        @foreach ($datos as $usr)
                            <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="mb-3">
                <label for="ta-descripcion" class="form-label">
                    <h3> ¿Con que tienes problemas? </h3>
                </label>
                <select name="Falla" id="Falla" class="form-select" aria-label="Default select example">
                    <option value="Conexion">LA CONEXION</option>
                    <option value="PC">MI PC/WYSE</option>
                    <option value="Accesorios">UN ACCESORIO DE MI PC</option>
                    <option value="Aplicaciones">UNA APLICACION</option>
                    <option value="Servidor">EL SERVIDOR</option>
                    <option value="Timbrado">TIMBRADO/CANCELACION</option>
                    <option value="Otros">OTRA COSA</option>
                </select>
            </div>
            <div class="mb-3">
                
            </div>
            <div class="mb-3">
                <label for="ta-descripcion" class="form-label">
                    <h3>Describenos tu falla</h3>
                </label>
                <textarea name="Detalles" class="form-control" name="detalles" id="detalles" rows="3" required></textarea>
            </div>
            <div class="mb-3" hidden>
                <textarea name="Creador_id" class="form-control" name="Creador_id" id="Creador_id" rows="1"> {{ Session::get('id') }} </textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">
                    <h3>Muestranos un poco mas</h3>
                </label>
                <br>
                <input name="file" type="file" id="file-input" enctype="multipart/form-data"/>
            </div>

            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                type="submit">Guardar</button>
        </div>
    </form>

@endsection
