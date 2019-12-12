	<?php if (isset($msj)) { 

		if ($msj=="Error"){ ?>
			<script type="text/javascript">
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					title: 'Error al validar sus credenciales!!',
					text: "Si cree que hay un error, contacte al administrador del sistema.",
					showConfirmButton: false,
					timer: 5000
				})
			</script>	
		<?php } //Fin alert Error
		
		if ($msj=="errorCorreo"){ ?>
			<script type="text/javascript">
				Swal.fire({
					position: 'top-end',
					icon: 'info',
					title: 'Error en correo!!',
					text: "El correo no se encuentra registrado en nuestra base de datos!.",
					showConfirmButton: false,
					timer: 5000
				})
			</script>
		<?php } //Fin alert Error correo no registrado

		if ($msj=="okCorreo"){ ?>
			<script type="text/javascript">
				Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Correo enviado!!',
					text: "Se envio su contraseña al correo especificado!.",
					showConfirmButton: false,
					timer: 5000
				})
			</script>
		<?php } //Fin alert correo enviado

		if ($msj=="errorEnviar"){ ?>
			<script type="text/javascript">
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					title: 'El correo no pudo ser enviado!!',
					text: "Contacte con el administrador del sistema!.",
					showConfirmButton: false,
					timer: 5000
				})
			</script>
		<?php }//Fin alert error al enviar correo

		if ($msj=='change') { ?>
			<script>
				Swal.fire({
					title: 'Se modifico exitosamente!!!',
					text: "La contraseña se cambio exitosamente",
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar',
					timer: 5000
				}).then((result) => {
				if (result.value) {
					window.location.href = "../login_controller/index";
				}
			})
			</script>
		<?php }

		if ($msj=="ErrorClave"){ ?>
			<script type="text/javascript">
				Swal.fire({
					position: 'top-end',
					icon: 'error',
					title: 'La contraseña no se modifico!!',
					text: "La contraseña actual que ha ingresado es incorrecta.",
					showConfirmButton: false,
					timer: 5000
				}).then((result) => {
				if (result.value) {
					window.location.href = "../login_controller/index";
				}
			})
			</script>	
		<?php } //Fin alert Error

		?>
		
		<?php } ?>