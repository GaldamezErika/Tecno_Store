<script>
	

	function validarP(){ 


		$nombre      = $('#nombre').val();
		$apellido    = $('#apellido').val();
		$telefono    = $('#telefono').val();


		if($nombre.length == 0){
        //document.getElementById("nombre").style.borderColor = "red"; 
        document.getElementById("nombre").style.boxShadow = '0 0 15px red'; 
        document.getElementById("nombre").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
    	document.getElementById("nombre").style.boxShadow = '0 0 0px green';
    }

    //Validar campo obligatorio
    if($apellido.length == 0){
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

    if($telefono.length <=8){
        document.getElementById("telefono").style.boxShadow = '0 0 15px red'; 
        document.getElementById("telefono").placeholder = "Este campo es obligatorio";   
        return false;
    }else{
        document.getElementById("telefono").style.boxShadow = '0 0 0px green';
    }
   

    return true;
};

    
    $(document).ready(function(){
	$('#telefono').mask('0000-0000', {placeholder: '0000-0000'});
});








</script>