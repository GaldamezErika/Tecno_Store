<script>
	
	$(document).ready(function(){ 

		mostrarProveedor();

		function mostrarProveedor(){ 

			$.ajax({ 
				type:'ajax',
				url: '<?php echo base_url('proveedor_C/get_proveedor') ?>',
				dataType: 'json',

				success: function(datos){ 
					var tabla= '';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){ 
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre+'</td>'+
						'<td>'+datos[i].apellido+'</td>'+
						'<td>'+datos[i].telefono+'</td>'+
						'<td>'+
						'<div class="dropdown">'+
						'<button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opcion'+
						'<span class="caret"></span>'+
						'</button>'+
						'<ul class="dropdown-menu">'+
						'<li><a href="javascript:;" class="borrar" data="'+datos[i].id_proveedor+'">Eliminar</a></li>'+
						'<li><a href="javascript:;" class="item-edit" data="'+datos[i].id_proveedor+'">Editar</a></li>'+
						'</ul>'+
						'</div>'+
						'</td>'+
						'</tr>';
						n++;
					}
					$('#tabla_proveedor').html(tabla);
				}
			});
		};// fin de mostrar


		$('#tabla_proveedor').on('click','.borrar',function(){ 
			$id=$(this).attr('data');

			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){
				$.ajax({ 
					type: 'ajax',
					method: 'post',
					url: '<?php echo base_url('proveedor_C/eliminar') ?>',
					data: {id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');
						if(respuesta==true){
							alertify.notify('Eliminado exitosamente','success',3,null);
							mostrarProveedor();
						}else{
							alertify.notify('Error al eliminar','error',3,null);
						}
					}
				});
			});
		});


		$('#nuevoProveedor').click(function(){
			$('#proveedor').modal('show');
			$('#proveedor').find('.modal-title').text('Nuevo proveedor')
			$('#formProve').attr('action','<?php echo base_url('proveedor_C/ingresar') ?>');
		});

		$('#btnGuardar').click(function(){
			$resp = validarP();

			if($resp == true){
				$url= $('#formProve').attr('action');
				$data= $('#formProve').serialize();

				$.ajax({ 
					type: 'ajax',
					method: 'post',
					url: $url,
					data: $data,
					dataType: 'json',

					success: function(respuesta){
						$('#proveedor').modal('hide');

						if(respuesta=='add'){
							alertify.notify('Igresado exitosamente!', 'success',10,null);
						}else if(respuesta=='edi'){
							alertify.notify('Actualizado exitosamente!', 'success',10,null);
						}else{ 
							alertify.notify('No se modifico!','error',10,null);
						}
						$('#formProve')[0].reset();
						mostrarProveedor();
					}

				});
			}
		});//fin de ingresar

		$('#tabla_proveedor').on('click','.item-edit',function(){
			var id = $(this).attr('data');

			$('#proveedor').modal('show');
			$('#proveedor').find('.modal-title').text('Editar proveedor');
			$('#formProve').attr('action','<?php echo base_url('proveedor_C/actualizar') ?>');

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url('proveedor_C/get_datos') ?>',
				data: {id:id},
				dataType: 'json',

				success: function(datos){
					$('#id').val(datos.id_proveedor);
					$('#nombre').val(datos.nombre);
					$('#apellido').val(datos.apellido);
					$('#telefono').val(datos.telefono);
				}
			});
		});

//**************************************************************************************************************


    //Limpiamos el formulario al clickear cerrar
    $('#cerrar').click(function(){
      $('#formProve')[0].reset();
    });


//**************************************************************************************************************

	});// fin de la clase





</script>