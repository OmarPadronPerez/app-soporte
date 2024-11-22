@extends('layout.app')

@section('content')
<style>
    button{
        margin: 10px 0;
    }
</style>
    <div class="container">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col">
                <h2>Nuevo usuario</h2>
            </div>

            <form action="{{ url('/nuevoUsuario/nsStorage') }}" method="POST" style="margin: 20px">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                        placeholder="" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name_user" id="name_user" aria-describedby="helpId"
                        placeholder="" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId"
                        placeholder="" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId"
                        placeholder="" />
                </div>


                <div class="form-check">
                    <input class="form-check-input" name="tipo" type="checkbox" value="" id="tipo" />
                    <label class="form-check-label" for="tipo"> Administrador </label>
                </div>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg "
                    type="submit">Entrar</button>

            </form>


        </div>



    </div>
@endsection
