$(document).ready(function(){

        $('#exampleModalCenter').on('show.bs.modal', function() {
          $('#info11').hide();
        });
 

        $("#clave21").keyup(function () {
            var value = $(this).val();
            validar_clave11(value);
        }).keyup();  



        $("#clave21").focus(function() {
          $('#info11').show();
      });
       

    });

    function validar_clave11(contrasenna)
    {
        var mayuscula = false;
        var numero = false;
        var length = false;
        var caracter_raro = false;

        if(contrasenna.length < 8)
        {
            $("#length4").css("color", "red");
            $('#length4').removeClass('valid').addClass('invalid');
            length = false;
        }else{
            $("#length4").css("color", "green");
            $('#length4').removeClass('invalid').addClass('valid');
            length = true;
        }

        if (contrasenna.match(/[A-Z]/)) {
            $("#mayuscula4").css("color", "green");
            $('#mayuscula4').removeClass('invalid').addClass('valid');
            mayuscula = true;
        }else{
            $("#mayuscula4").css("color", "red");
            $('#mayuscula4').removeClass('valid').addClass('invalid');
            mayuscula = false;              
        }

        if (contrasenna.match(/\d/)) {
            $("#numero4").css("color", "green");
            $('#numero4').removeClass('invalid').addClass('valid');
            numero = true;
        }else{
            $("#numero4").css("color", "red");
            $('#numero4').removeClass('valid').addClass('invalid');
            numero = false;             
        }

        if (contrasenna.match(/[!@\^(){}[\]|\-]/)) {
            $("#especial4").css("color", "green");
            $('#especial4').removeClass('invalid').addClass('valid');
            caracter_raro = true;
        }else{
            $("#especial4").css("color", "red");
            $('#especial4').removeClass('valid').addClass('invalid');
            caracter_raro = false;              
        }

        if(mayuscula == true && length == true && caracter_raro == true && numero == true)
        {
            return true;
        }else{
            return false;
        }           
    }


    function validarLogin(){

       var usuario21 = document.getElementById('usuario21').value;
       var clave21 = document.getElementById('clave21').value;

    //Validar campo obligatorio
    if(usuario21.length == 0){ 
        document.getElementById("usuario21").style.boxShadow = '0 0 15px red'; 
        document.getElementById("usuario21").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("usuario21").style.boxShadow = '0 0 15px green';
    } 

    if(clave21.length == 0){ 
        document.getElementById("clave21").style.boxShadow = '0 0 15px red'; 
        document.getElementById("clave21").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("clave21").style.boxShadow = '0 0 15px green';
    } 

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}

function mostrarPassword6(){
    var clave21 = document.getElementById("clave21");
    if(clave21.type == "password"){
        clave21.type = "text";
        $('.icon1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        clave21.type = "password";
        $('.icon1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}
