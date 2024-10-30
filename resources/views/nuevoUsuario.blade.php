@extends('layout.app')

@section('content')
    <x-regla />

    <form action="{{url('/nuevoUsuario/nsStorage')}}" method="POST" style="margin: 20px">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">usuario</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId"
                placeholder="" />
        </div>


        <div class="form-check">
            <input class="form-check-input" name="tipo" type="checkbox" value="1" id="tipo" />
            <label class="form-check-label" for=""> ¿administrador? </label>
        </div>
            
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
            type="submit">Entrar</button>

    </form>

@endsection
