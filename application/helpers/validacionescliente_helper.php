<script type="text/javascript">  




 function disponibilidadCorreo($correo){


  $.ajax({  

    type: 'ajax',
    method: 'post', 

    url: '<?php echo base_url('cliente_controller/validarCorreo') ?>',
    data: {correo:$correo},
    dataType: 'json',

    success: function(respuesta){  


      if (respuesta==true) {
        $r = true; 
        $("#infoCorreo").text('Correo ya registrado').css({color: 'red', fontSize: '10px'});
        $("#correo").css('boxShadow', '0 0 15px red');
    }else{
        $r = false; 
        $("#infoCorreo").text('Correo disponible').css({color: 'green', fontSize: '10px'});
    }
},
});
  return $r;
};

function disponibilidadusuario($usuario){


  $.ajax({  

    type: 'ajax',
    method: 'post', 

    url: '<?php echo base_url('cliente_controller/validarusuario') ?>',
    data: {usuario:$usuario},
    dataType: 'json',

    success: function(respuesta){  


      if (respuesta==true) {
        $r = true; 
        $("#infousuario").text('usuario ya registrado').css({color: 'red', fontSize: '10px'});
        $("#usuario").css('boxShadow', '0 0 15px red');
    }else{
        $r = false; 
        $("#infousuario").text('Correo disponible').css({color: 'green', fontSize: '10px'});
    }
},
});
  return $r;
};


function validarFormulario(){

    $nombre  = $('#nombre').val();
    $apellido  = $('#apellido').val();
    $telefono  = $('#telefono').val();
    $direccion   = $('#direccion').val();
    $correo      = $('#correo').val();
    $sexo        = $("#sexo option:selected").val();
    $departamento = $("#departamento option:selected").val();
    $usuario  = $('#usuario2').val();
    $contrasenna  = $('#contrasenna').val();
    $rol        = $("#rol option:selected").val();



    //Validar campo obligatorio
    if($nombre.length == 0){
        //document.getElementById("nombre").style.borderColor = "red"; 
        document.getElementById("nombre").style.boxShadow = '0 0 15px red'; 
        document.getElementById("nombre").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("nombre").style.boxShadow = '0 0 0px green';
    }
    if($apellido.length == 0){
        //document.getElementById("nombre").style.borderColor = "red"; 
        document.getElementById("apellido").style.boxShadow = '0 0 15px red'; 
        document.getElementById("apellido").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("apellido").style.boxShadow = '0 0 0px green';
    }
    if($telefono == ""){
        document.getElementById("telefono").style.boxShadow = '0 0 15px red'; 
        document.getElementById("telefono").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("telefono").style.boxShadow = '0 0 0px green';
    }

    if($telefono.length<=8 ){
        document.getElementById("telefono").style.boxShadow = '0 0 15px red'; 
        document.getElementById("telefono").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("telefono").style.boxShadow = '0 0 0px green';
    }

    if($direccion.length == 0){
        //document.getElementById("nombre").style.borderColor = "red"; 
        document.getElementById("direccion").style.boxShadow = '0 0 15px red'; 
        document.getElementById("direccion").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("direccion").style.boxShadow = '0 0 0px green';
    }



    if(!(/\S+@\S+\.\S+/.test($correo))){
        document.getElementById("correo").style.boxShadow = '0 0 15px red'; 
        document.getElementById("correo").placeholder = "Debe digitar un correo valido";
        $("#infoCorreo").text('Debe digitar un correo valido').css({color: 'red', fontSize: '10px'});
        return false;
    }else{
        document.getElementById("correo").style.boxShadow = '0 0 0px green';
    }

    if(status == "add"){
        $resp = disponibilidadCorreo($correo);
        if($resp == true){
            return false;
        }
    }

    if($sexo == 0){
        document.getElementById("sexo").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("sexo").style.boxShadow = '0 0 0px green';
    }

    if($departamento == 0){
        document.getElementById("departamento").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("departamento").style.boxShadow = '0 0 0px green';
    }


    if($usuario.length == 0){
        document.getElementById("usuario2").style.boxShadow = '0 0 15px red'; 
        document.getElementById("usuario2").placeholder = "Debe digitar un usuario valido";
        $("#infousuario").text('Debe digitar un usuario valido').css({color: 'red', fontSize: '10px'});
        return false;
    }else{
        document.getElementById("usuario2").style.boxShadow = '0 0 0px green';
    }

    if(status == "add"){
        $resp = disponibilidadusuario($usuario);
        if($resp == true){
            return false;
        }

    }
    if(status == "add"){
     if($contrasenna.length == 0){
      if(validar_clave(contrasenna) == false)
      {
        document.getElementById("contrasenna").style.boxShadow = '0 0 15px red';
        return false;
    }
    else
    {
        document.getElementById("contrasenna").style.boxShadow = '0 0 0px green';
    }

}  
}      



if($rol == 0){
    document.getElementById("rol").style.boxShadow = '0 0 15px red'; 
    return false;
}else{
    document.getElementById("rol").style.boxShadow = '0 0 0px green';
}






    //Validar campo obligatorio


    return true;

};













$(document).ready(function(){

    //FORMATO DE MASCARAS
    //$("#correo").mask('email');
    $('#telefono').mask('0000-0000', {placeholder: '0000-0000'});
    // $("#correo").mask({'autoUnmask': true});

});




</script> 

