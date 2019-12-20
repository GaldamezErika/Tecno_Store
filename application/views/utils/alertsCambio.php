<?php 
if (isset($msj)) {
	if($msj=='success') { ?>
		<script>
			Swal.fire({
				title: 'Cambio de clave!!!',
				text: "El cambio de clave es exitoso",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../home_controller/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php } 


	if($msj=='ErrorCP') { ?>
		<script>
			Swal.fire({
				position: 'top-end',
				icon: 'error',
				title: 'Error al validar sus credenciales!!',
				text: "Si cree que hay un error, contacte al administrador del sistema.",
				showConfirmButton: false,
				timer: 5000
			})
		</script>
	<?php } 

}

?>
