<?php $this->load->helper('ajax_producto'); //Incluimos nuestro helper ?>

<body>

	<?php $this->load->view('nabvar'); ?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">


				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-body d-flex justify-content-between align-items-center">
						<button type="button" class="btn btn-primary" style="float: right;" id="nuevoProducto"><i class='fa fa-th-list'></i>
							Nuevo Producto
						</button>
						<h2>Productos</h2>
					</div>
					<br>
					<br>
					<div class="card-body">
						<div class="table-responsive">
							<table id="productos1" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
								<thead>
									<tr>
										<th>N°</th>
										<th>Descripción</th>
										<th>Especificación</th>
										<th>Precio de venta</th>
										<th>Precio de compra</th>
										<th>Cantidad</th>
										<th>Imagen</th>
										<th>Categoria</th>
										<th>Marca</th>
										<th>Proveedor</th>
										<th>Opciones</th>
									</tr>
								</thead>
								<tbody id="tabla_producto">

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Modal Image-->
	<div class="modal" tabindex="-1" role="dialog" id="modalImage" data-keyboard="false" data-backdrop="static" data-keyboard="false" data-backdrop="static">
		<!--data-keyboard="false" data-backdrop="static" sirven para bloquear el modal cuando clickeen afuera de el-->
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div id="imagen"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div >
	</div>
	<!-- Modal Image fin-->

	<!-- Eliminar -->
	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Confirmacion de eliminar</h4>
				</div>
				<div class="modal-body">
					<p>¿Realmente desea eliminar el registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnBorrar">Si, borrar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Eliminar -->


	<!-- MODAL INGRESAR Y ACTUALIZAR -->
	<div class="modal fade" id="producto" data-keyboard="false" data-backdrop="static"><!--Cambiar el id por su tabla-->
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"></h4>

				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form id="formProducto" action="" method="POST" style="color: #46281e;" enctype="multipart/form-data"><!-- Colocar el id del formulario  -->
						<input type="hidden" name="id_producto" id="id" value="0"><!-- id  -->

						<table style="width: 80%; margin:auto; ">
							<tr>
								<td><label>Descripción</label></td>
								<td><input type="text" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="descripcion" id="descripcion"></td>
							</tr>
							<tr>
								<td><label>Especificación</label></td>
								<td><input type="text" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="especificación" id="especificación"></td>
							</tr>
							<tr>
								<td><label>Precio de venta</label></td>
								<td><input type="text" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="p_venta" id="p_venta"></td>
							</tr>
							<tr>
								<td><label>Precio de compra</label></td>
								<td><input type="text" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="p_compra" id="p_compra"></td>
							</tr>
							<tr>
								<td><label>Cantidad</label></td>
								<td><input type="text" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="cantidad" id="cantidad"></td>
							</tr>
							<tr>
								<td><label>Categoria</label></td>
								<td>
									<select name="categoria" id="categoria" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										<option value="">Seleccione categoria</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Marca</label></td>
								<td>
									<select name="marca" id="marca" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										<option value="">Seleccione marca</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Proveedor</label></td>
								<td>
									<select name="proveedor" id="proveedor" class="form-control inp" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
										<option value="">Seleccione proveedor</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Imagen</label></td>
								<td>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i id="iconoFile" class="fas fa-file-upload text-secondary"></i></span>
										</div>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="file" name="file">
											<label class="custom-file-label" for="inputGroupFile01">Elige un archivo de imagen</label>
										</div></div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<div id="mensajeAlerta"></div>
									</td>
								</tr>
								<tr>
									<td colspan="2"><div id="imgPortada"></div></td>
								</tr>
							</table>						
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
							<button type="button" id="cerrar" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						</form>	
					</div>
				</div>
			</div>
		</div>	
		<!-- MODAL INGRESAR Y ACTUALIZAR FIN -->



		<script>
			$(document).ready(function() {
				$('#productos1').DataTable();
			} );
		</script>
