console.log("en js");
//entradas principales
const inName = document.getElementById('name');
const inLast_name = document.getElementById('lastName');
const inLast_name2 = document.getElementById('lastName2');
const inId = document.getElementById('id');
const inArea = document.getElementById('area');

//entradas a calcular
const inName_user = document.getElementById('user_vpn');
const inVpn = document.getElementById('pass_vpn');

const inCorreo = document.getElementById('correo');
const inpassCorreo = document.getElementById('pass_correo');

const inUserServidor = document.getElementById('user_servidor');
const inPassServidor = document.getElementById('pass_servidor');

const inLaptop = document.getElementById('pass_pc');
const inAplicaciones = document.getElementById('pass_aps');



//eventos de principal
inName.addEventListener("keyup", (e) => {crearContra(e)});
inLast_name.addEventListener("keyup", (e) => {crearContra(e)});
inLast_name2.addEventListener("keyup", (e) => {crearContra(e)});
inId.addEventListener("keyup", (e) => {crearContra(e)});
inArea.addEventListener("keyup", (e) => {crearContra(e)});


function crearContra(e) {
    e.target.value = e.target.value.toUpperCase();

    if (inName.value.length > 1
        && inLast_name.value.length > 1
        && inId.value.length > 1
        && inArea.value.length > 1
    ) {
        let nombre=inName.value.trim();
        nombreArray=nombre.split(" ");
        let apellido=inLast_name.value.trim();
        apellidoArray=apellido.split(" ");
        if(apellidoArray.length>1){
            apellido = apellidoArray[1];
        }
        
        let apellido2=inLast_name2.value.trim();

        let iniciales = nombre.substring(0, 1) + apellido.substring(0, 1);

        var usuario = nombre.substring(0, 1) + apellido;
        var correo="";
        if(apellidoArray.length>1){
            correo = nombreArray[0] + "." + apellido + "@GRUPOABG.COM";
        }else{
            correo = nombreArray[0] + "." + apellido + "@GRUPOABG.COM";
        }

        var passLaptop = "ABG_54321_" + iniciales;
        var nomina = inId.value;
        var passServidor = "";

        switch (inArea.value) {
            case "SOPORTE":
                nomina='0'+nomina;
                passServidor = "ADM_" + nomina + "_" + iniciales;
                
                break;
            case "DESARROLLO":
                nomina='4'+nomina;
                passServidor = "SIS_" + nomina + "_" + iniciales;
                
                break;
            case "SELECCION":
                nomina='3'+nomina;
                passServidor = "SEL_" + nomina + "_" + iniciales;
                
                break;
            
            case "RRHH":
                nomina='6'+nomina;
                passServidor = "RRHH_" + nomina + "_" + iniciales;
                
                break;
            case "NOMINAS":
                nomina='2'+nomina;
                passServidor = "NOM_" + nomina + "_" + iniciales;
                
                break;
        }
        var passcorreo = "MAIL_"  + nomina + "_"  + iniciales
        var passVpn = "VPN_" + nomina + "_" + iniciales;
        
        var passApp="APP_" + nomina +"_"+ iniciales;

        inName_user.value=usuario.toLowerCase();
        inCorreo.value = correo.toLowerCase();
        inpassCorreo.value = passcorreo;
        inLaptop.value = passLaptop;
        inAplicaciones.value = passApp;
        inVpn.value = passVpn;
        inPassServidor.value = passServidor;
        inUserServidor.value=usuario.toLowerCase();
        inLast_name2.value=apellido2;
    }

    return 0;
}

