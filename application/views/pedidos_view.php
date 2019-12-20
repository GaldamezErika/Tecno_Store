
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
					<div class="card-header py-3">
						<h2 class="m-0 font-weight-bold">Pedidos</h2>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="pedidos" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
								<?php if(isset($id_venta)){ ?>
									<thead>
										<tr>
											<th>Descripción</th>
											<th>Especificación</th>
											<th>Precio</th>
											<th>Cantidad</th>
											<th>SubTotal</th>
										</tr>
									</thead>
									<tbody>
										<?php $totalfinal = 0; foreach($detalle as $dt){ ?>
											<tr>
												<td><?= $dt->descripcion ?></td>
												<td><?= $dt->especificacion ?></td>
												<td>$ <?= $dt->precio_venta ?></td>
												<td><?= $dt->cantidad ?></td>
												<td>$ <?= $dt->sub_total ?></td>
											</tr>
											<?php 
											$totalfinal = $totalfinal + $dt->sub_total;
											?>
										<?php } ?>
										<tr>
											<td align="center">
												<a href="<?= base_url('pedidos_controller/index') ?>">
													<button class="btn btn-primary" type="button"  aria-haspopup="true" aria-expanded="false">
														Regresar
													</button></a>
												</td>
												<td colspan="3" align="right">
													<strong>Total a pagar</strong>
												</td>
												<td>
													$ <?php echo $totalfinal; ?>
												</td>
											</tr>
										</tbody>

									<?php }else{ ?>

										<thead>
											<tr>
												<th>N° Factura</th>
												<th>Nombre</th>
												<th>Fecha de compra</th>
												<th>Tipo de pago</th>
												<th>Detalle</th>
												<th>Estado</th>
											</tr>
										</thead>
										<tbody>
											<?php if (count($ventas)>0) {?>
												<?php foreach($ventas as $v){ ?>
													<tr>
														<td><?= $v->n_factura ?></td>
														<td><?= $v->nombre .' '. $v->apellido ?></td>
														<td><?= $v->fecha ?></td>
														<td><?= $v->nombre_tipo_pago ?></td>
														<td>
															<a href="<?= base_url('pedidos_controller/venta/'.$v->id_venta) ?>">
																<button class="btn btn-primary btn-sm dropdown-toggle" type="button">Ver detalle
																</button>
															</a>
														</td>
														<td>
															<div class="dropdown">
																<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"><?= $v->nombre_estado ?>
																<span class="caret"></span>
															</button>
															<ul class="dropdown-menu">

																<?php if ($v->nombre_estado == "Vendido") {

																	?>

																	<li><a><?= $v->nombre_estado ?></a></li>

																<?php }else{ 

																	foreach($estado as $es){ ?>

																		<li><a onclick="return confirm('Estás seguro que deseas cambiar el estado de la venta?');" class="dropdown-item" href="<?= base_url('pedidos_controller/modificar/'.$v->id_venta.'/'.$es->id_estado) ?>"><?= $es->nombre_estado ?></a></li>

																	<?php } 

																} ?>

															</ul>
														</div> 												
													</td>
												</tr>
											<?php } ?>
										</tbody>
										<?php

									}else{
										echo "<p class='alert alert-danger'>No hay Pedidos</p>";
									}


									?>
								<?php } ?>
							</table>
						</div>
					</div>
					<?php if (isset($mensaje)){ echo $mensaje; } ?>
				</div>

				<?php $this->load->view('utils/alertsPedido') ?>





			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<script>
		$(document).ready(function() {
			$('#pedidos').DataTable();
		} );
	</script>