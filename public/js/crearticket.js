console.log("crearticket.js");

const select1 = document.getElementById("Falla");

const select2 = document.getElementById('Falla2');
const campo3 = document.getElementById('campo3');
const btnResolver = document.getElementById('btn_resolver');

const divDetalles = document.getElementById('enviar');
const btnSalir = document.getElementById('btnSalir');

const cbEmpleados = document.getElementById('cb_empleados_todos');
const formEmpleados = document.getElementById('formEmpleados');
const divtimbrado=document.getElementById('divTimbrado');

select1.addEventListener('change', campo2);
cbEmpleados.addEventListener('change', function () {
    console.log('check')
    if (cbEmpleados.checked) {
        formEmpleados.classList.add("d-none");
    } else {
        formEmpleados.classList.remove("d-none");
    }
});

function limpiar(select) {
    do {
        select.remove(0);
    } while (select.length > 0)
}

function campo2() {

    if (select2.length > 0) {
        limpiar(select2);
        campo3.classList.add("d-none");
    }
    reset();

    switch (select1.value) {
        case 'Conexion':
            select2.appendChild(new Option('ESCOJA UNA OPCION', ''));
            select2.appendChild(new Option('No me puedo conectar a la VPN', 'VPN'));
            select2.appendChild(new Option('No tengo internet', 'Internet'));
            select2.classList.remove("d-none");
            break;

        case 'PC':
            select2.appendChild(new Option('ESCOJA UNA OPCION', ''));
            select2.appendChild(new Option('Mi equipo no enciende', 'No_enciende'));
            select2.appendChild(new Option('Mi equipo enciende pero tiene pantalla azul', 'p_azul'));
            select2.appendChild(new Option('Se traba mucho / Esta muy lenta', 'se_traba'));
            select2.classList.remove("d-none");
            break;


        case 'Accesorios':
            select2.appendChild(new Option('ESCOJA UNA OPCION', ''));
            select2.appendChild(new Option('Mi mouse no funciona bien', 'mouse'));
            select2.appendChild(new Option('Mi teclado no funciona bien', 'teclado'));
            select2.appendChild(new Option('Mi adaptador de red usb', 'adaptador_red'));
            select2.classList.remove("d-none");
            break;

        case 'Servidor':
            select2.appendChild(new Option('ESCOJA UNA OPCION', ''));
            select2.appendChild(new Option('Mi sesión esta lenta', 'sesión_lenta'));
            select2.appendChild(new Option('No entra a mi sesión', 'sesión_contreseña'));
            select2.appendChild(new Option('No me puedo conectar al servidor', 'servidor_no_responde'));
            select2.classList.remove("d-none");
            break

        case 'Timbrado':
            
            divtimbrado.classList.remove("d-none");
            brake;


        default:
            select2.classList.add("d-none");
            campo3.classList.add("d-none");
            break;
    }

}

select2.addEventListener('change', campo2Conexion);

function campo2Conexion() {
    campo3.innerHTML = '';
    var cambiar = 0;
    switch (select2.value) {
        case 'VPN':
            campo3.innerHTML = '<h3>¿Que hago si no me conecta a la VPN?</h3><ul><li>Revisa que tu equipo este <b>conectado a internet</b> puedes abrir algunas paginas o un video de youtube para verificar tu conexion</li><li>Revisa que tu equipo tenga una <b>conexion estable</b>, conectate por cable si tienes la posibilidad</li><li><b>Revisa tu usuario y contraseña</b>, los puedes consultar en el apartado de "mi informacion"</li><li>Revisa la velocidad de tu internet, puedes hacerlo en la pagina de <a target="_blank" href="https://www.speedtest.net/es">speedtest</a></li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'Internet':
            campo3.innerHTML = '<h3>¿No tienes internet en tu equipo?</h3><ul><li>Revisa si tu equipo esta <b>conectado a la red.</b></li><li>Posiblemente funcione <b>deconectar tu equipo de la red y volverlo a conectar.</b></li><li>Revisa que tengas <b>internet en otros dispositivos.</b></li><li><b>Checa la velocidad de tu internet</b>, puedes hacerlo en la pagina de <a href="https://www.speedtest.net/es">speedtest</a>, una velocidad muy baja, <b>menor de 2mb</b>, te dara la sensacion de que no tienes internet.</li><li>Revisa tu modem u ONT, la mayoria de ellos tienen un <b>led de internet o LOS que indican si tienen señal.</b></li><li>Si ves un error en el modem u ONT o en los cables que tiene sera mejor <b>hablar a con tu proveedor</b> para que te de asistencia.</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'No_enciende':
            campo3.innerHTML = '<h3>¿Tu equipo no enciende?</h3><ul><li>Revisa que este bien <b>conectado a la electricidad.</b></li><li>Usualmente hay un <b>led que indica si esta conectado</b> a la electricidad ¿Esta encendido?</li><li>Intenta <b>conectar tu equipo directo al enchufe de la pared</b>, puede que la extencion o regleta no funcione.</li><li>¿Se escuchan los ventiladores? puede que sea <b>la pantalla no este funcionando</b>, intenta conectar otra.</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'p_azul':
            campo3.innerHTML = '<h3>¡Un pantallazo azul!</h3><ul><li><b>Intenta apagarla</b>, se puede hacer dejando aplanado el boton de encender 10 segundos y prendela otra vez</li></ul><p>Con esto no hay mucho que hacer, si no funciono el reiniciarla, <b>contacta al quipo de soporte</b></p>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'se_traba':
            campo3.innerHTML = '<h3>¿Tu equipo se esta trabando?</h3><ul><li>Intenta <b>reiniciar tu quipo</b> eso cerrara programas que estan causando problemas</li><li>si es tu sesión remota, <b>revisa tu internet</b>, si el internet esta lento o inestable tardas en ver lo de tu sesión y sentiras que va lento</li><li>Puede que un programa no este funcionando, para forzar a cerrarlo puedes aplanar los botones de ctrl, alt y sup en tu teclado, en la opcion de <b>administrador de tareas</b>, esa ventana te indicara si un programa tiene problemas y podras cerrarlo, <b><br>CUIDADO: TODO LO QUE ESTABAS HACIENDO EN ESE PROGRAMA SE BORRARA SI NO ESTABA GUARDADO</b></li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'mouse':
            campo3.innerHTML = '<h3>¿Tu mouse esta fallando?</h3><ul><li><b>La tierra se acumula en la parte de abajo</b> aveces tapando el laser, limpiala y funcionará mejor</li><li>Los mouse inalambricos tienen una tapa en la parte de abajo, al quitarla podras ver <b>la bateria, puedes remplazarla</b> sin problemas, <b>ve al area de sistemas</b> para que te podamos dar otra</li><li>Puede que de verdad ya no funcione visita el area de sistemas para que puedan darte otro</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'teclado':
            campo3.innerHTML = '<h3>¿Tu teclado esta fallando?</h3><ul><li>Si es un teclado individual puede que tenga algo de tierra atorada, voltealo y dale algunos golpes en la parte de atras</li><li>Si es el teclado del la laptop puedes limpiarlo con cuidado con un trapo algo humedo</li><li>Contacta al area de sistemas para ver otras opciones</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'adaptador_red':
            campo3.innerHTML = '<h3>¿No esta funcionando el adaptador de red USB?</h3><ul><li><b>Revisa que este bien conectado</b>, la mayoria tienen un led que indica si esta funcionando, intenta deconectarlo y conectarlo en otro puerto de tu equipo</li><li>Si esta bien conectado <b>revisa que este bien conectado el cable de red al adaptador</b> y que el equipo no mencione "conectado sin internet", en este caso probablemente sea el cable que no esta bien conectado o que realmente no tengas internet en tu modem u ONT</li><li>Si el adaptador tiene algun daño visible <b>llevalo al area de sistemas para revisarlo</b></li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'sesión_lenta':
            campo3.innerHTML = '<h3>¿Tu sesión no funciona como deveria?</h3><ul><li><b>Revisa tu internet</b>, si el internet esta lento o inestable tardas en ver lo de tu sesión y sentiras que va lento</li><li>Puede que algun programa o proceso este interfiriendo con el servidor, mejor <b>avisa al area de sistemas</b> para que puedan revisarlo</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'servidor_no_responde':
            campo3.innerHTML = '<h3>¡¿El servidor no responde?!</h3><ul><li>Revisa que tu equipo este <b>conectado a internet</b>, puedes usar los consejos de la seccion de "conexion/no teno internet"</li><li>Si estas fuera de la oficina, revisa que tu equipo este <b>conectado a la VPN</b> puedes usar los consejos de "conexion/no me puedo conectar a la VPN"</li><li>Si estas seguro/segura que todo esta conectado correctamente <b>avisa al area de sistemas</b> puede que algo este pasando con el servidor</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;
        case 'sesión_contreseña':
            campo3.innerHTML = '<h3>¿no puedes entrar a tu secion?</h3><ul><li>Revisa que tu equipo este <b>conectado a internet</b>, puedes usar los consejos de la seccion de "conexion/no teno internet"</li><li>Si estas fuera de la oficina, revisa que tu equipo este <b>conectado a la VPN</b> puedes usar los consejos de "conexion/no me puedo conectar a la VPN"</li><li>Si estas seguro/segura que todo esta conectado correctamente <b>avisa al area de sistemas</b> puede que algo este pasando con el servidor</li></ul>';
            campo3.classList.remove("d-none");
            cambiar = 1;
            break;

        default:
            reset();
            break;
    }

    if (cambiar != 0) {
        setTimeout(function () {
            btnResolver.classList.remove("d-none");
            //btnResolver.setAttribute("data-aos", "fade-down");
        }, 5000);

    } else {
        reset();
    }
}

function mostrar_enviar(estado) {
    if (estado == 1) {
        divDetalles.classList.remove("d-none");
        btnSalir.classList.add("d-none");
    } else {
        divDetalles.classList.add("d-none");
        btnSalir.classList.remove("d-none");
    }
}

function reset() {
    btnResolver.classList.add("d-none");
    divDetalles.classList.add("d-none");
    btnSalir.classList.add("d-none");
    divtimbrado.classList.add("d-none");
}


