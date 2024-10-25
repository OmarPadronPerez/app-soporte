@extends('layout.app')

@section('content')
    <x-regla />

    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">usuario</label>
            <input type="text" class="form-control" name="usurio" id="usuario" aria-describedby="helpId" placeholder="" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Contraseña</label>
            <input type="text" class="form-control" name="contraseña" id="contraseña" aria-describedby="helpId"
                placeholder="" />
        </div>
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
            type="submit">Entrar</button>
    </form>
@endsection
