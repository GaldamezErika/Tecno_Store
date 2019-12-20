	$(document).ready(function(){
		$("#contrasenna").keyup(function () {
			var value = $(this).val();
			$resp = validar_clave(value);
			console.log($resp);
		}).keyup();

		//CheckBox mostrar contraseña
		$('#ShowPassword').click(function () {
			$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
		});

		$("#correo").on("blur", function(){
			var value = $(this).val();
			$resp = disponibilidadCorreo(value);
			console.log($resp);
		});
	});

	function mostrarPassword(){
		var cambio = document.getElementById("contrasenna");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
	
	function validar_clave(contrasenna)
	{
		var mayuscula = false;
		var numero = false;
		var length = false;
		var caracter_raro = false;

		if(contrasenna.length < 8)
		{
			$("#length").css("color", "red");
			$('#length').removeClass('valid').addClass('invalid');
			length = false;
		}else{
			$("#length").css("color", "green");
			$('#length').removeClass('invalid').addClass('valid');
			length = true;
		}

		if (contrasenna.match(/[A-Z]/)) {
			$("#mayuscula").css("color", "green");
			$('#mayuscula').removeClass('invalid').addClass('valid');
			mayuscula = true;
		}else{
			$("#mayuscula").css("color", "red");
			$('#mayuscula').removeClass('valid').addClass('invalid');
			mayuscula = false;				
		}

		if (contrasenna.match(/\d/)) {
			$("#numero").css("color", "green");
			$('#numero').removeClass('invalid').addClass('valid');
			numero = true;
		}else{
			$("#numero").css("color", "red");
			$('#numero').removeClass('valid').addClass('invalid');
			numero = false;				
		}

		if (contrasenna.match(/[!@\^(){}[\]|\-]/)) {
			$("#especial").css("color", "green");
			$('#especial').removeClass('invalid').addClass('valid');
			caracter_raro = true;
		}else{
			$("#especial").css("color", "red");
			$('#especial').removeClass('valid').addClass('invalid');
			caracter_raro = false;				
		}

		if(mayuscula == true && length == true && caracter_raro == true && numero == true)
		{
			return true;
		}else{
			return false;
		}			
	}

	function validarFormulario(){

	var nombre2    = document.getElementById("nombre2").value;
	var apellido2  = document.getElementById("apellido2").value;
	var sexo2      = document.getElementById("sexo2").selectedIndex;
	var direccion2 = document.getElementById("direccion2").value;
	var pais2       = document.getElementById("pais2").selectedIndex;
	var telefono2  = document.getElementById("telefono2").value;
	var correo2    = document.getElementById("correo2").value;
	var usuario3   = document.getElementById("usuario3").value;
	var contrasenna    = document.getElementById("contrasenna").value;
	var clave11    = document.getElementById("clave11").value;



	if (nombre2.length == 0) {

		document.getElementById("nombre2").style.boxShadow = "0 0 15px red";
		document.getElementById("nombre2").placeholder = "Este campo es obligatorio";

		return false;
	}else{

		document.getElementById("nombre2").style.boxShadow = "0 0 15px green";
	}


	if (apellido2.length == 0) {

		document.getElementById("apellido2").style.boxShadow = "0 0 15px red";
		document.getElementById("apellido2").placeholder = "Este campo es obligatorio";

		return false;
	}else{

		document.getElementById("apellido2").style.boxShadow = "0 0 15px green";
	}


	if (sexo2 == 0) {

		document.getElementById("sexo2").style.boxShadow = "0 0 15px red";
		document.getElementById("sexo2").placeholder = "Este campo es obligatorio";

		return false;
	}else{

		document.getElementById("sexo2").style.boxShadow = "0 0 15px green";
	}


	if (direccion2.length == 0) {

		document.getElementById("direccion2").style.boxShadow = "0 0 15px red";
		document.getElementById("direccion2").placeholder = "Este campo es obligatorio";

		return false;
	}else{

		document.getElementById("direccion2").style.boxShadow = "0 0 15px green";
	}


	if (pais2 == 0) {

		document.getElementById("pais2").style.boxShadow = "0 0 15px red";
		document.getElementById("pais2").placeholder = "Este campo es obligatorio";

		return false;
	}else{

		document.getElementById("pais2").style.boxShadow = "0 0 15px green";
	}


	if (telefono2.length == 0) {

		document.getElementById("telefono2").style.boxShadow = "0 0 15px red";
		document.getElementById("telefono2").placeholder = "Este campo es obligatorio";

		return false;
	}else{

		document.getElementById("telefono2").style.boxShadow = "0 0 15px green";
	}


    if (!(/\S+@\S+\.\S+/.test(correo2))) {

    	document.getElementById("correo2").style.boxShadow = "0 0 15px red";
    	document.getElementById("correo2").placeholder = "Este campo es obligatorio";

    	return false;
    }else{

    	document.getElementById("correo2").style.boxShadow = "0 0 15px green";
    }


    if (usuario3.length == 0) {

    	document.getElementById("usuario3").style.boxShadow = "0 0 15px red";
    	document.getElementById("usuario3").placeholder = "Este campo es obligatorio";

    	return false;
    }else{

    	document.getElementById("usuario3").style.boxShadow = "0 0 15px green";
    }

    if (contrasenna.length == 0) {

    	document.getElementById("contrasenna").style.boxShadow = "0 0 15px red";
    	document.getElementById("contrasenna").placeholder = "Este campo es obligatorio";

    	return false;
    }else{

    	document.getElementById("contrasenna").style.boxShadow = "0 0 15px green";
    }


    if (clave11.length == 0) {
    	document.getElementById("clave11").style.boxShadow = "0 0 15px red";
    	document.getElementById("clave11").placeholder = "Este campo es obligatorio";

    	return false;
    }else{

    	document.getElementById("clave11").style.boxShadow = "0 0 15px green";
    }

    if($contrasenna.length<=7 ){
        document.getElementById("contrasenna").style.boxShadow = '0 0 15px red'; 
        document.getElementById("contrasenna").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("contrasenna").style.boxShadow = '0 0 0px green';
    }


    if(contrasenna!=clave11){
    	document.getElementById("msgv").innerHTML = "Las claves no coinciden";
    	document.getElementById("msgv").style.color = "red";
    	document.getElementById("clave11").style.boxShadow = "0 0 15px red";
    	document.getElementById("contrasenna").style.boxShadow = "0 0 15px red";
    	return false;
    }else{
    	document.getElementById("msgv").innerHTML = "";
    }

    return true;

}



$(function () {
	var selector2 = document.getElementById("telefono2");

	var tel = new Inputmask("9999-9999", { "clearIncomplete": true });
	tel.mask(selector2);
});