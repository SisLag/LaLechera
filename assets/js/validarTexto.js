function validarUsuario(){
	
  var ok = true;
  var msg = "";
  var alert = document.getElementById("alert");

var numeroDocumento = document.getElementById("numeroDocumento").value; 
var nombreEncargado = document.getElementsByName("nombreEncargado")[0].value;
var apellido1Encargado = document.getElementsByName("apellido1Encargado")[0].value;
var apellido2Encargado = document.getElementsByName("apellido2Encargado")[0].value;
var usuarioEncargado = document.getElementsByName("usuarioEncargado")[0].value;
var claveEncargado = document.getElementsByName("claveEncargado")[0].value;
var perfilEncargado = document.getElementsByName("perfilEncargado")[0].value;
While(ok){
if ((numeroDocumento == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos con * son requeridos";
	
    ok = false;
}
else if(!(numeroDocumento.length >= 8 && numeroDocumento.length <= 10)){
	msg += "- El numero de identidad debe ser de 8 a 10 caracteres";
	
		ok = false;
    }
	else if ((nombreEncargado == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos con * son requeridos\n";
    ok = false;
}
    else if(!(nombreEncargado.length >= 2 && nombreEncargado.length <= 40)){
		msg += "- El nombre debe ser mayor de 2 caracteres y menor de 40 caracteres\n";
		ok = false;
    }
	else if ((apellido1Encargado == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos con * son requeridos\n";
    ok = false;
}
    else if(!(apellido1Encargado.length >= 2 && apellido1Encargado.length <= 40)){
		msg += "- El apellido Paterno debe ser mayor de 2 caracteres y menor de 40 caracteres\n";
		ok = false;
    }
	else if ((apellido2Encargado == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos con * son requeridos\n";
    ok = false;
}
    else if(!(apellido2Encargado.length >= 2 && apellido2Encargado.length <= 40)){
		msg += "- El apellido Materno debe ser mayor de 2 caracteres y menor de 40 caracteres\n";
		ok = false;
    }
	else if ((usuarioEncargado == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos con * son requeridos\n";
    ok = false;
}
else if(!(usuarioEncargado.length >= 4 && usuarioEncargado.length <= 20)){
    msg += "- El usuario debe ser mayor de 4 caracteres y menor de 20 caracteres\n";
    ok = false;
}
	else if ((claveEncargado == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos con * son requeridos\n";
    ok = false;
}
    else if(!(claveEncargado.length >= 8 && claveEncargado.length <= 16)){
		msg +="- La clave debe contener de 8 a 16 caracteres\n";
		ok = false;
    }
    else if(perfilEncargado == "-- Seleccionar Permisos --"){
		msg +="- Debe seleccionar una opcion\n";
		ok = false;
    }	

	if(ok == false)
	alert.insertAdjacentHTML("beforeend","<strong>Error!</strong> "+msg+"\n");
    return ok; 	
}
	
}

function validarAnimal(){
	 var ok = true;
  var msg = "";

var chapetaAnimal = document.getElementById("chapetaAnimal").value; 
var nombreAnimal = document.getElementsByName("nombreAnimal")[0].value;
var fechNacimAnimal = document.getElementsByName("fechNacimAnimal")[0].value;
var madreAnimal = document.getElementsByName("madreAnimal")[0].value;
var padreAnimal = document.getElementsByName("padreAnimal")[0].value;
var razaAnimal = document.getElementsByName("razaAnimal")[0].value;
var tipoAnimal = document.getElementsByName("tipoAnimal")[0].value;
var servicioAnimal = document.getElementsByName("servicioAnimal")[0].value;
if ((chapetaAnimal == "") || (nombreAnimal == "") || (fechNacimAnimal == "") || (madreAnimal == "") || (padreAnimal == "") || (razaAnimal == "") || (tipoAnimal == "") || (servicioAnimal == "")) {  //COMPRUEBA CAMPOS VACIOS
    msg += "- Los campos requeridos deben ser diligenciados\n";
    ok = false;
}
	
if(ok == false)
    alert.insertAdjacentHTML("beforeend","<strong>Well done!</strong> -"+msg+"\n");
  return ok;
}
