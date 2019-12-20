<script>
	

$(document).ready(function(){

	$('#correo2').blur(function(){

		$id = $("#correo2").val();

		$.ajax({

			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url('registrar_controller/validarCorreo') ?>',
			data: {correo2:$id},
			dataType: 'json',

			success: function(respuesta){

				if(respuesta==true){

					$('#infoCorreo').text('Correo NO disponible').css('color','red');

				}else{

					$('#infoCorreo').text('Correo disponible').css('color','green');
				}
			},
		});
	});
});

</script>