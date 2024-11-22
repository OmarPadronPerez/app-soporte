@extends('layout.app')

@section('content')
    <style>
        .principal {
            min-height: 100vh;
        }

        form {
            margin: auto;
        }

        .campo {
            width: 100%;
        }
    </style>
    <div class="principal">


        <form action="{{ url('/gUsuario') }}" method="POST"class="container">
            @csrf

            <div class="row justify-content-center align-items-center g-2">
                <h2>Actualizar usuario</h2>
                <div>
                    <a name="" id="" class="btn btn-primary" href="/usuarios" role="button"><-cancelar </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-borderless  align-middle">

                        <tbody class="">
                            <tr class="table-primary">
                                <td scope="row"><b>ID: </b></td>
                                <td>{{ $datos[0]->id }}</td>
                            </tr>
                            <tr class="table-primary">
                                <td scope="row"><b>Usuario: </b></td>
                                <td>{{ $datos[0]->name }}</td>
                            </tr>
                            <tr class="table-primary">
                                <td scope="row"><b>Nombre: </b></td>
                                <td>{{ $datos[0]->name_user }}</td>
                            </tr>
                            <tr class="table-primary">
                                <td scope="row"><b>Contraseña: </b></td>
                                <td><input type="password" class="campo" name="password" id="password"></td>
                            </tr>
                            <tr class="table-primary">
                                <td scope="row"><b>Permisos:</b></td>
                                <td>
                                    @php
                                        $adm = $est = '';
                                        if ($datos[0]->tipo) {
                                            $adm = 'selected';
                                        } else {
                                            $est = 'selected';
                                        }
                                    @endphp
                                    <select class="form-select " name="tipo" id="tipo">
                                        <option value="0" {{ $est }}>Estandar</option>
                                        <option value="1" {{ $adm }}>Administrador</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="table-primary">
                                <td scope="row"><b>Estado:</b></td>
                                @php
                                    $act = $noact = '';
                                    if ($datos[0]->activo) {
                                        $act = 'selected';
                                    } else {
                                        $noact = 'selected';
                                    }
                                @endphp
                                <td>
                                    <select class="form-select " name="activo" id="activo">
                                        <option value="1" {{ $act }}>Activo</option>
                                        <option value="0" {{ $noact }}>Inactivo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="table-primary">
                                <td scope="row"><b>Correo: </b></td>
                                <td><input type="email" class="campo" name="correo" id="correo" value="{{$datos[0]->correo}}"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <input type="text" class="id d-none" name="id" id="id" value='{{ $datos[0]->id }}'>

            <button type="submit" class="btn btn-primary">
                Guardar
            </button>

        </form>
    </div>
@endsection
