<script>
	
	$(document).ready(function(){


//**************************************************************************************************************
	// FUNCION MOSTRAR
	mostrarProducto();
	function mostrarProducto(){
		$.ajax({
			type: 'ajax',
			url: '<?= base_url('producto_controller/get_producto'); ?>',
			dataType: 'json',

			success: function(datos){
				var tabla='';
				var i;
				var n=1;

				for(i=0;i<datos.length;i++){
					tabla+=
					'<tr>'+
					'<td>'+n+'</td>'+
					'<td>'+datos[i].descripcion+'</td>'+
					'<td>'+datos[i].especificacion+'</td>'+
					'<td>'+datos[i].precio_venta+'</td>'+
					'<td>'+datos[i].precio_compra+'</td>'+
					'<td>'+datos[i].stock+'</td>'+
					'<td>'+'<img data="'+datos[i].id_producto+'" class="ima" width="100px" height="100px" src="<?= base_url();?>'+datos[i].imagen+'"></td>'+
					'<td>'+datos[i].nombre_categoria+'</td>'+
					'<td>'+datos[i].nombre_marca+'</td>'+
					'<td>'+datos[i].nombre+'</td>'+
					'<td>'+
					'<div class="dropdown">'+
					'<button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opcion'+
					'<span class="caret"></span>'+
					'</button>'+
					'<ul class="dropdown-menu">'+
					'<li><a href="javascript:;" class="borrar" data="'+datos[i].id_producto+'">Eliminar</a></li>'+
					'<li><a href="javascript:;" class="item-edit" data="'+datos[i].id_producto+'">Editar</a>'+'<input type="hidden" name="rutaN'+datos[i].id_producto+'" id="rutaN'+datos[i].id_producto+'" value="'+datos[i].imagen+'"></li>'+
					'</ul>'+
					'</div>'+
					'</td>'+
					'</tr>';
					n++;
				}
				$('#tabla_producto').html(tabla);
			}

		});
		}//FIN FUNCION MOSTRAR

//**************************************************************************************************************

//**************************************************************************************************************

//Mostrar imagen de tabla
$('#tabla_producto').on('click','.ima', function(){
			$id = $(this).attr('data');//Para capturar el dato según el boton que demos click

			$('#modalImage').modal('show'); //Para mostrar el modal de image

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?= base_url('producto_controller/get_imagen') ?>',
				data: {id:$id},
				dataType: 'json',

				success: function(datos){
					var imagen='';
					var i;

					for(i=0;i<datos.length;i++){
						imagen+='<img class="ima2" src="<?= base_url();?>'+datos[i].imagen+'">';
					}
					$('#imagen').html(imagen);
				}
			});

		});//Fin funcion borrar

//**************************************************************************************************************
//**************************************************************************************************************
	//Borrar
	$('#tabla_producto').on('click','.borrar', function(){
			$id = $(this).attr('data');//Para capturar el dato según el boton que demos click
			$rutaN = $('#rutaN'+$id).val();

			$('#modalBorrar').modal('show'); //Para mostrar el modal de eliminar

			$('#btnBorrar').unbind().click(function(){ //Unbind sirve para que elimine cuando le de aceptar en el boton del modal
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('producto_controller/eliminar') ?>',
					data: {id:$id,rutaN:$rutaN},
					dataType: 'json',

					success: function(respuesta){
						 $('#modalBorrar').modal('hide');//Escondemos el modal de eliminar
						 if (respuesta==true) {
						 	alertify.notify('Eliminado exitosamente', 'success',10,null);
						 	mostrarProducto();
						 }else{
						 	alertify.notify('Error al eliminar', 'error',10,null);
						 }
						}
					});
			});

		});//Fin funcion borrar

//**************************************************************************************************************
//**************************************************************************************************************


		//Abrir modal para agregar nuevo registro
		$('#nuevoProducto').click(function(){
			$('#imgPortada').hide();
			$('#id').val('0');
			//mostramos el modal que tiene el formulario para ingresar una categoria
			$('#producto').modal('show');

			//modificamos el titulo del modal
			$('#producto').find('.modal-title').text('Nuevo Producto');
			//modificamos el atributo action, le agregamos la ruta del controlador y modelo para ingresar
			$('#formProducto').attr('action','<?= base_url('producto_controller/ingresar')?>');
			restablecerInputs();
		});

//PARA TRABAJAR IMAGENES SE DEBE TRABAJAR SUBMIT PARA ENVIAR LA INFORMACION EN FORMATO DATA FORM
$('#formProducto').on('submit',function(e){
	e.preventDefault();
	$id= $('#id').val();
	$res=validaciones($id);
	if ($res==true) {

		$url = $('#formProducto').attr('action');

		$.ajax({
		//Respetar esta estructura para trabajar FormDta
		method: 'POST',
		url: $url,
		data: new FormData(this),
		cache: false,
		contentType: false, 
		processData:false,
		dataType: 'json',
		success: function(datas){
			$('#producto').modal('hide');
			if(datas=='add'){
				alertify.notify('Ingresado exitosamente!', 'success',10, null);
			}else if(datas=='edi'){
				alertify.notify('Actualizado exitosamente!', 'success',10, null);
			}else{
				alertify.notify('error al ingresar!', 'error',10, null);
			}
			$('#formProducto')[0].reset();
			mostrarProducto();
		}
	});
	}

		});//fin evento del boton guardar del modal

//**************************************************************************************************************
//**************************************************************************************************************

			//EDITAR
			$('#tabla_producto').on('click', '.item-edit', function(){
				restablecerInputs();
				var id = $(this).attr('data');
				$('#imgPortada').show();
				$('#producto').modal('show');
				$('#producto').find('.modal-title').text('Editar producto');
				$('#formProducto').attr('action','<?= base_url('producto_controller/actualizar')?>');

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?= base_url('producto_controller/get_datos')?>',
					data: {id:id},
					dataType: 'json',


					success: function(datos){
						$('#id').val(datos.id_producto);
						$('#descripcion').val(datos.descripcion);
						$('#especificación').val(datos.especificacion);
						$('#p_venta').val(datos.precio_venta);
						$('#p_compra').val(datos.precio_compra);
						$('#cantidad').val(datos.stock);
						$('#categoria').val(datos.id_categoria);
						$('#marca').val(datos.id_marca);
						$('#proveedor').val(datos.id_proveedor);
						$img='';
						$img+='<center><img style="width: 80%; height: 80%;" src="<?= base_url() ?>'+datos.imagen+'"></center>'+
						'<input type="hidden" name="rutaN'+datos.id_producto+'" id="rutaN'+datos.id_producto+'" value="'+datos.imagen+'">';
						$('#imgPortada').html($img);
					}
				});
		});//fin de evento editar


//**************************************************************************************************************
//**************************************************************************************************************
//para mostrar las categorias en los selects

get_categoria();

function get_categoria(){

	$.ajax({
		type: 'ajax',
		url: '<?= base_url('producto_controller/get_categoria') ?>',
		dataType: 'json',
		success: function(datos){
			var op = '';
			var i;

			op +="<option value=''>---Seleccione categoria---</option>";
			for(i=0; i<datos.length; i++){
				op +="<option value='"+datos[i].id_categoria+"'>"+datos[i].nombre_categoria+"</option>";
			} 
			$('#categoria').html(op);
		}
	});

}//fin

//**************************************************************************************************************
//**************************************************************************************************************
//para mostrar las marcas en los selects

get_marca();

function get_marca(){

	$.ajax({
		type: 'ajax',
		url: '<?= base_url('producto_controller/get_marca') ?>',
		dataType: 'json',
		success: function(datos){
			var op = '';
			var i;

			op +="<option value=''>---Seleccione marca---</option>";
			for(i=0; i<datos.length; i++){
				op +="<option value='"+datos[i].id_marca+"'>"+datos[i].nombre_marca+"</option>";
			} 
			$('#marca').html(op);
		}
	});

}//fin

//**************************************************************************************************************
//**************************************************************************************************************
//para mostrar las proveedores en los selects

get_proveedor();

function get_proveedor(){

	$.ajax({
		type: 'ajax',
		url: '<?= base_url('producto_controller/get_proveedor') ?>',
		dataType: 'json',
		success: function(datos){
			var op = '';
			var i;

			op +="<option value=''>---Seleccione proveedor---</option>";
			for(i=0; i<datos.length; i++){
				op +="<option value='"+datos[i].id_proveedor+"'>"+datos[i].nombre+"</option>";
			} 
			$('#proveedor').html(op);
		}
	});

}//fin

//**************************************************************************************************************
//**************************************************************************************************************
//VALIDACIONES

function validaciones($id){
				//Validacion Nombre
				$descripcion= $('#descripcion').val();
				$especificación= $('#especificación').val();
				$p_venta= $('#p_venta').val();
				$p_compra= $('#p_compra').val();
				$cantidad= $('#cantidad').val();
				$categoria= $('#categoria').val();
				$marca= $('#marca').val();
				$proveedor= $('#proveedor').val();
				  

				if ($descripcion.length==0) {
					$('#descripcion').css('box-shadow','inset 0 0 15px red');
					$('#descripcion').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#descripcion').css('box-shadow','inset 0 0 15px green');
				}

				if ($especificación.length==0) {
					$('#especificación').css('box-shadow','inset 0 0 15px red');
					$('#especificación').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#especificación').css('box-shadow','inset 0 0 15px green');
				}

				if ($p_venta.length==0  ) {
					$('#p_venta').css('box-shadow','inset 0 0 15px red');
					$('#p_venta').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#p_venta').css('box-shadow','inset 0 0 15px green');
				}



				if ($p_venta.length < 8 ) {
					$('#p_venta').css('box-shadow','inset 0 0 15px green');
				}else{
										
					$('#p_venta').css('box-shadow','inset 0 0 15px red');
					$('#p_venta').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}


				if ($p_compra.length==0) {
					$('#p_compra').css('box-shadow','inset 0 0 15px red');
					$('#p_compra').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#p_compra').css('box-shadow','inset 0 0 15px green');
				}

				if ($p_compra.length < 8 ) {
					$('#p_compra').css('box-shadow','inset 0 0 15px green');
				}else{
										
					$('#p_compra').css('box-shadow','inset 0 0 15px red');
					$('#p_compra').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}


				if ($cantidad.length==0) {
					$('#cantidad').css('box-shadow','inset 0 0 15px red');
					$('#cantidad').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#cantidad').css('box-shadow','inset 0 0 15px green');
				}

				if ($cantidad.length < 5) {
					$('#cantidad').css('box-shadow','inset 0 0 15px green');
					
				}else{
					$('#cantidad').css('box-shadow','inset 0 0 15px red');
					$('#cantidad').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}

				if ($categoria.length==0) {
					$('#categoria').css('box-shadow','inset 0 0 15px red');
					$('#categoria').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#categoria').css('box-shadow','inset 0 0 15px green');
				}

				if ($marca.length==0) {
					$('#marca').css('box-shadow','inset 0 0 15px red');
					$('#marca').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#marca').css('box-shadow','inset 0 0 15px green');
				}

				if ($proveedor.length==0) {
					$('#proveedor').css('box-shadow','inset 0 0 15px red');
					$('#proveedor').attr("placeholder", "Este campo es obligatorio");
					return	false;
				}else{
					$('#proveedor').css('box-shadow','inset 0 0 15px green');
				}

				if ($id==0) {
				//Validacion file longitud
				if ($('#file').get(0).files.length === 0){
					var msj='';
					msj+='<div class="alert alert-danger alert-dismissible fade show" role="alert">'+'Campo <strong>portada</strong> vacio, por favor carga una imagen!'+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
					'</button></div>';
					$('#mensajeAlerta').html(msj);
					return	false;
				}
			}


			var fileInput = document.getElementById('file');
			var filePath = fileInput.value;
			if (filePath.length>0) {
				//Validacion file tipo

				var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
				if(!allowedExtensions.exec(filePath)){
					var msj='';
					msj+='<div class="alert alert-danger alert-dismissible fade show" role="alert">'+'Formato no valido || Permitidos <strong>jpg, jpeg y png.</strong>'+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
					'</button></div>';
					$('#mensajeAlerta').html(msj);
					return	false;
				}

				//Validacion file peso
				var limite_kb= 200;
				if($("#file")[0].files[0].size >=limite_kb * 1024){
					var msj='';
					msj+='<div class="alert alert-danger alert-dismissible fade show" role="alert">'+'Archivo sobrepasa los <strong>2 MB</strong>!'+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					'<span aria-hidden="true">&times;</span>'+
					'</button></div>';
					$('#mensajeAlerta').html(msj);
					return	false;
				}

			}


	//**************************************************
	return true;
}

//**************************************************************************************************************


				$('#file').change(function(){

					//Validacion file tipo
					var fileInput = document.getElementById('file');
					var filePath = fileInput.value;
					var allowedExtensions = /(.jpg|.jpeg|.png)$/i;
					if(!allowedExtensions.exec(filePath)){
						var msj='';
						msj+='<div class="alert alert-danger alert-dismissible fade show" role="alert">'+'Formato no valido || Permitidos <strong>jpg, jpeg y png.</strong>'+
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
						'<span aria-hidden="true">&times;</span>'+
						'</button></div>';
						$('#mensajeAlerta').html(msj);

						$('#iconoFile').removeClass('text-success').addClass('text-secondary');
						$('#iconoFile').removeClass('fa-check').addClass('fa-file-upload');
					}else{
					//Validacion file peso
					var limite_kb= 300;
					if($("#file")[0].files[0].size >=limite_kb * 1024){
						var msj='';
						msj+='<div class="alert alert-danger alert-dismissible fade show" role="alert">'+'Archivo sobrepasa los <strong>2 MB</strong>!'+
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
						'<span aria-hidden="true">&times;</span>'+
						'</button></div>';
						$('#mensajeAlerta').html(msj);
						$('#iconoFile').removeClass('text-success').addClass('text-secondary');
						$('#iconoFile').removeClass('fa-check').addClass('fa-file-upload');
					}else{
						$(".alert").alert('close');
						$('#iconoFile').removeClass('text-secondary').addClass('text-success');
						$('#iconoFile').removeClass('fa-file-upload').addClass('fa-check');
					}
				}

				


			});

//**************************************************************************************************************


		//Limpiamos el formulario al clickear cerrar
		$('#cerrar').click(function(){
			$('#formProducto')[0].reset();
			$('#imgPortada').hide();
		});


//**************************************************************************************************************

		//Funcion para limpiar inputs
		function restablecerInputs()
		{
			$('#descripcion').css('box-shadow','none');
			$('#descripcion').attr("placeholder", "");

			$('#especificación').css('box-shadow','none');
			$('#especificación').attr("placeholder", "");

			$('#p_venta').css('box-shadow','none');
			$('#p_venta').attr("placeholder", "");

			$('#p_compra').css('box-shadow','none');
			$('#p_compra').attr("placeholder", "");

			$('#cantidad').css('box-shadow','none');
			$('#cantidad').attr("placeholder", "");

			$('#categoria').css('box-shadow','none');
			$('#categoria').attr("placeholder", "");

			$('#marca').css('box-shadow','none');
			$('#marca').attr("placeholder", "");

			$('#proveedor').css('box-shadow','none');
			$('#proveedor').attr("placeholder", "");

			$(".alert").alert('close');
			$('#iconoFile').removeClass('text-success').addClass('text-secondary');
			$('#iconoFile').removeClass('fa-check').addClass('fa-file-upload');
		}//FIN Funcion para limpiar inputs


//**************************************************************************************************************

$('#p_venta').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
    .replace(/^(0*)/,"")
      .replace(/\D/g, "")
      .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
      .replace(/\B(?=(\d{4})+(?!\d)\.?)/g, ".")
    ;   
  });
});

$('#p_compra').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
    .replace(/^(0*)/,"")
      .replace(/\D/g, "")
      .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
      .replace(/\B(?=(\d{4})+(?!\d)\.?)/g, ".")
    ;
  });
});

$('#cantidad').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
    .replace(/^(0*)/,"")
    .replace(/\D/g, "")

    ;   
  });
});




});



		</script>