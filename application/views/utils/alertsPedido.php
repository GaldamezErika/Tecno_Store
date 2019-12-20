<?php 
if (isset($msj)) {
	

	if ($msj=='Elim') { ?>
		<script>
			Swal.fire({
				title: 'Cancelado!!!',
				text: "El pedido se cancelo",
				icon: 'Devuelto',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../ped_cliente_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }
}

?>




<!-- ALERTA DE EL PRODUCTO NO SE PUEDE BORRAR O DEVOLVER -->
<script>
	function alerta_estado(id){
		Swal.fire({
			title: 'No puedes cambiar el estado de tu compra',
			text: "El producto ya ha sido adquirido",
			icon: 'warning',
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aceptar'
		})
	}




	function cancelar(id){
		Swal.fire({
			title: 'Esta seguro que desea cancelar el pedido?',
			text: "Esta accion no se podra deshacer!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, cancelar!'
		}).then((result) => {
			if (result.value) {
				window.location.href = "eliminar/"+id;
			}
		})
	}


</script>

