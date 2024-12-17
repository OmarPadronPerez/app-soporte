<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <style>
        h2 {
            text-align: center;
        }

        .principal {
            min-height: 100vh;
        }

        form {
            margin: auto;
        }

        .campo {
            width: 100%;
        }

        input {
            background: none;
            border: none;
            width: 100%;
        }

        select {
            display: inline !important;
        }

        .row {
            margin: 5px 0;
        }

        .tarjeta {
            padding: 0px;
            border: 1px solid black;
        }

        .tarjetainfo {
            border: 1px solid black;
            margin 0;

        }
    </style>
    <main class="justify-content-center align-items-center">
        <div class="principal">

            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <h2>Usuario</h2>
                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="tarjeta">
                    <div class="row justify-content-center align-items-center ">
                        <div class="col">Numero de nomina: <b>654</b></div>
                        <div class="col">Area: <b>{{ $area }}</b></div>
                    </div>

                    <div class="row justify-content-center align-items-center">

                        <div class="col-12 col-md-6">
                            Nombre: <b>{{ $name . ' ' . $lastName . ' ' . $lastName2 }}</b>
                        </div>
                    </div>
                </div>

                <div class="row  justify-content-between align-items-between "style="padding:0;">

                    <div class="col-12 col-md-6 tarjeta">
                        <div class="col-12 ">
                            <h2><b>Laptop</b></h2>
                        </div>
                        <div class="col-12 tarjetainfo" style="padding:0 12px;">
                            <input type="text" name="pass_pc" id="pass_pc" value="{{ $pass_pc }}">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 tarjeta">
                        <div class="col-12 ">
                            <h2><b>Kiosco</b></h2>
                        </div>
                        <div class="col-12 tarjetainfo "style="padding:0 12px;">
                            <input type="text" name="pass_aps" id="pass_aps" value="{{ $pass_aps }}">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center tarjeta">
                    <div class="col-12  titulo">
                        <h2 class=""><b>Correo</b></h2>
                    </div>
                    <div class="col-6 col-md-6 tarjetainfo">
                        <input type="text" name="" id="" value="{{ $correo }}" readonly>
                    </div>
                    <div class="col-6 col-md-6 tarjetainfo">
                        <input type="text" name="pass_correo" id="pass_correo" value="{{ $pass_correo }}">
                    </div>
                </div>

                <div class="row justify-content-center align-items-center tarjeta">
                    <div class="col-12  titulo">
                        <h2 class=""><b>VPN</b></h2>
                    </div>
                    @php
                        $contrasena = $pass_vpn;
                    @endphp
                    <div class="col-12 col-md-6 tarjetainfo">
                        <input type="text" name="" id="" value="{{ $user_vpn }}"readonly>
                    </div>
                    <div class="col-12 col-md-6 tarjetainfo">
                        <input type="text" name="pass_vpn" id="pass_vpn" value="{{ $pass_vpn }}">
                    </div>
                </div>

                <div class="row justify-content-center align-items-center tarjeta">
                    <div class="col-12  titulo">
                        <h2 class=""><b>Servidor</b></h2>
                    </div>
                    <div class="col-12 col-md-6 tarjetainfo">
                        <input type="text" name="" id="" value="{{ $user_servidor }}" readonly>
                    </div>
                    <div class="col-12 col-md-6 tarjetainfo">
                        <input type="text" name="pass_servidor" id="pass_servidor" value="{{ $pass_servidor }}">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
