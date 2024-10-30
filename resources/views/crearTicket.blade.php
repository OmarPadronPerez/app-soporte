@extends('layout.app')

@section('content')
<x-regla />
<div style="height: 20px"></div>

<form action="{{url('/nuevoTicket')}}" method="post" enctype="multipart/form-data" class="container formulrio">
    {{ csrf_field() }}
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <h1>¿Tienes problemas? </h1>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example">
                <option selected>¿Que esta fallando?</option>
                <option value="PC">PC</option>
                <option value="CONEXION">CONEXION</option>
                <option value="ACCESORIOS">ACCESORIOS DE PC</option>
                <option value="APLICACIONES">APLICACIONES</option>
                <option value="SERVIDOR">SERVIDOR</option>
                <option value="OTROS">OTROS</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ta-descripcion" class="form-label">Describenos tu falla</label>
            <textarea class="form-control" name="ta-descripcion" id="ta-descripcion" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Evidencia</label>
            <br>
            <input type="file" name="foto" id="foto">
        </div>




        <a type="submit" value="agregar" name="enviar" id="enviar" class="btn btn-primary " href="#" role="button">
            Enviar
        </a>

    </div>





</form>

</div>
@endsection