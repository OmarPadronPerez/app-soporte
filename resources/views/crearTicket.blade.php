@extends('layout.app')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@section('content')

    <style>
        form {
            margin-bottom: 20px;
        }

        .btnSalir {
            margin: 10px 0;
            text-align: center;
        }

        .btn_resolver {
            margin: 10px 0;
            text-align: center
        }
    </style>

    <form action="{{ url('/nuevo/envtkt') }}" method="POST" enctype="multipart/form-data" class="container formulrio">
        @csrf
        <div class="row justify-content-center align-items-center g-2">

            <div class="col">
                <h2>¿Tienes problemas? </h2>
            </div>
            <hr>

            @if (isset($datos))
                <div class="mb-3">
                    <h3> Usuarios </h3>
                    <select name="usuario2" id="usuario2" class="form-select" aria-label="Default select example">
                        @foreach ($datos as $usr)
                            <option value="{{ $usr->id }}">{{ $usr->name . ' ' . $usr->lastName . ' ' }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="mb-3">
                <label for="Falla" class="form-label">
                    <h3> ¿Con que tienes problemas? </h3>
                </label>
                <select name="Falla" id="Falla" class="form-select" aria-label="Default select example">
                    <option value="">ESCOJA UNA OPCION</option>
                    <option value="Conexion">LA CONEXION</option>
                    <option value="PC">MI PC/WYSE</option>
                    <option value="Accesorios">UN ACCESORIO DE MI PC</option>
                    <option value="Aplicaciones">UNA APLICACION</option>
                    <option value="Servidor">EL SERVIDOR / MI SESIÓN</option>
                    <option value="Timbrado">TIMBRADO/CANCELACION</option>
                    <option value="Otros">OTRA COSA</option>
                </select>
            </div>
            <div class="mb-3" class="" id="campo2">
                <select name="Falla2" id="Falla2" class="form-select d-none"
                    aria-label="Default select example"></select>
            </div>

            <div class="" class="d-none" id="campo3"></div>

            <div id="divTimbrado" class="d-none row form justify-content-center align-items-center g-2">
                <div class="col-6 col-md-3">
                    <label for="" class="form-label">Empresa</label>
                    <input type="text" class="form-control" name="Empresa" id="Empresa" aria-describedby="helpId"
                        placeholder="" />
                </div>

                <div class="col-6 col-md-3">
                    <label for="" class="form-label">Ejercicio</label>
                    <input type="text" class="form-control" name="Empresa" id="Empresa" aria-describedby="helpId"
                        placeholder="" value=2025 />
                </div>

                <div class="col-12 col-md-3">
                    <label for="" class="form-label">Tipo de periodo</label>
                    <select class="form-select form-select-lg" name="" id="">
                        <option value="Diario">Diario</option>
                        <option value="Semanal">Semanal</option>
                        <option selected value="Catorcenal">Catorcenal</option>
                        <option value="Quincenal">Quincenal</option>
                        <option value="Mensual">Mensual</option>
                    </select>

                </div>

                <div class="col-12 col-md-3">
                    <label for="" class="form-label">Periodo</label>
                    <input type="text" class="form-control" name="Periodo" id="Periodo" aria-describedby="helpId"
                        placeholder="" />
                </div>
                <div class="row" style="padding:0; margin:20px 0px">
                    <label for="" class="form-label">Empleados</label>
                    <div class="form-check col-3 col-md-2">
                        <input class="form-check-input" type="checkbox" value="" id="cb_empleados_todos" checked />
                        <label class="form-check-label" for="" id=''> Todos </label>

                    </div>
                    <div class="col-9 col-md-9 d-none" id="formEmpleados">
                        <input type="text" class="form-control" name="formEmpleados" id=""
                            aria-describedby="helpId" placeholder="" />
                    </div>

                </div>

                <div class="col-12">
                    <label for="" class="form-label">Comentarios</label>
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>

                <div class="col-12 justify-content-center align-items-center">
                    <div class="btn-group col" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio1">
                            confirmar
                        </label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2" >
                            modificar
                        </label>
                    </div>
                </div>
            </div>


            <div class="col d-none btn_resolver" id="btn_resolver">
                <h2>¿Te sirvio esta informacion?</h2>

                <div class="col-12 ">
                    <div class="btn-group col" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio1" onclick="mostrar_enviar(0)">Pude resolver
                            mi problema, gracias</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2" onclick="mostrar_enviar(1)">no, necesito
                            mas ayuda</label>
                    </div>
                </div>
            </div>
            <div class="mb-3" hidden>
                <textarea name="Creador_id" class="form-control" name="Creador_id" id="Creador_id" rows="1"> {{ Session::get('id') }} </textarea>
            </div>

            <div id="enviar" class='mb-3 d-none'>
                <div class="mb-3" id="">
                    <label for="detalles" class="form-label ">
                        <h3>Describenos tu falla</h3>
                    </label>
                    <textarea name="Detalles" class="form-control" name="detalles" id="detalles" rows="3" required></textarea>
                </div>

                <div class="mb-3" id="archivo">
                    <label for="file-input" class="form-label">
                        <h3>¿Necesitas mostrarnos un archivo?</h3>
                    </label>
                    <br>
                    <input name="file" type="file" id="file-input" enctype="multipart/form-data" />
                </div>

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit"
                    id="botonguardar">Guardar</button>
            </div>
        </div>
        <div class="col-12 btnSalir d-none" id="btnSalir">
            <a name="" class="btn btn-primary col-6" href="#" role="button">Salir</a>
        </div>
    </form>


    <script src="{{ asset('js/crearticket.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
