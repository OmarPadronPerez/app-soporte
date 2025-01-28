@extends('layout.app')

@section('content')
    <style>
        button {
            margin: 10px 0;
        }

        .datos_drincipal,
        .datos_secundrio {
            border: 0.5px solid black;
            border-radius: 10px;
            margin-bottom: 5px;
            padding: 0.5rem;
        }
    </style>


    <div class="container">
        <div class="row justify-content-center align-items-center g-2 ">

            <div class="col">
                <h2>Nuevo usuario</h2>
            </div>

            <form action="{{ url('/nuevoUsuario/nsStorage') }}" method="POST" style="margin: 20px">
                @csrf
                <div class="datos_drincipal ">
                    <div class="row g-2 justify-content-center align-items-center ">
                        <div class="mb-3 col-12 col-md-4">
                            <input type="text" class="form-control" name="name" id="name"
                                aria-describedby="helpId" placeholder="Nombre(s)" required />
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                aria-describedby="helpId" placeholder="Apellido Paterno"required />
                        </div>
                        <div class="mb-3 col-12 col-md-4">
                            <input type="text" class="form-control" name="lastName2" id="lastName2"
                                aria-describedby="helpId" placeholder="Apellido Materno"required />
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col-12 col-md-4">
                            <select name="area" id="area" class="form-select" aria-label="Default select example"
                                required>
                                <option value="">Área</option>
                                <option value="NOMINAS">NOMINAS</option>
                                <option value="RRHH">RRHH</option>
                                <option value="SELECCION">SELECCION</option>
                                <option value="SOPORTE">SOPORTE</option>
                                <option value="DESARROLLO">DESARROLLO</option>
                            </select>
                        </div>

                        <div class=" col-12 col-md-4">
                            <input type="number" class="form-control" name="id" id="id"
                                aria-describedby="helpId" placeholder="Numero de nomina"required />
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="checkbox" class="btn-check col" id="administrador" name="administrador" autocomplete="off">
                            <label class="btn btn-outline-primary" for="administrador">Administrador</label><br>


                        </div>

                    </div>
                </div>

                <div class="datos_secundrio">
                    <div class="row g-2 ">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="pass_pc" class="form-label">Contraseña pc/laptop</label>
                            <input type="text" class="form-control" name="pass_pc" id="pass_pc"
                                aria-describedby="helpId" placeholder="" />
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="pass_aps" class="form-label">Contraseña Aplicaciones</label>
                            <input type="text" class="form-control" name="pass_aps" id="pass_aps"
                                aria-describedby="helpId" placeholder="" />
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo"
                                aria-describedby="helpId" placeholder="&#64;grupoabg" />
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="pass_correo" class="form-label">Contraseña correo</label>
                            <input type="text" class="form-control" name="pass_correo" id="pass_correo"
                                aria-describedby="helpId" placeholder="" />
                        </div>
                    </div>

                    <div class="row g-2 ">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="user_vpn" class="form-label">Usuario vpn</label>
                            <input type="text" class="form-control" name="user_vpn" id="user_vpn"
                                aria-describedby="helpId" placeholder="Usuario" />
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="pass_vpn" class="form-label">Contraseña VPN</label>
                            <input type="text" class="form-control" name="pass_vpn" id="pass_vpn"
                                aria-describedby="helpId" placeholder="" />
                        </div>
                    </div>

                    <div class="row g-2 ">
                        <div class=" col-12 col-md-6">
                            <label for="user_servidor" class="form-label">Usuario servidor</label>
                            <input type="text" class="form-control" name="user_servidor" id="user_servidor"
                                aria-describedby="helpId" placeholder="" />
                        </div>
                        <div class=" col-12 col-md-6">
                            <label for="pass_servidor" class="form-label">Contraseña servidor</label>
                            <input type="text" class="form-control" name="pass_servidor" id="pass_servidor"
                                aria-describedby="helpId" placeholder="" />
                        </div>
                    </div>
                </div>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg "
                    type="submit">Guardar</button>

            </form>
        </div>
    </div>

    <script src="{{ asset('js/AgregarUsuario.js') }}"></script>
@endsection
