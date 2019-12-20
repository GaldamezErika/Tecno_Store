<script>
	

$(document).ready(function(){

	$('#usuario3').blur(function(){

		$id = $("#usuario3").val();

		$.ajax({

			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url('registrar_controller/validarUsuario') ?>',
			data: {usuario3:$id},
			dataType: 'json',

			success: function(respuesta){

				if(respuesta==true){

					$('#infoUsuario').text('Usuario NO disponible').css('color','red');

				}else{

					$('#infoUsuario').text('Usuario disponible').css('color','green');
				}
			},
		});
	});
});

</script>