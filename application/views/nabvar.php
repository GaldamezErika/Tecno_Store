<!-- HEADER -->
<header>


	<?php 

	if ($this->session->userdata('rol') == 1) {

		?>


		<!-- TOP HEADER -->
		<?php 

		if ($this->session->userdata('rol')) {

			?>

			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-user-o"></i> email@email.com</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-user-o"></i> Cambiar clave</a></li>
						<li><a href="<?php echo base_url('login_controller/cerrar')?>"><i class="fa fa-user-o"></i> Cerrar Sesión</a></li>
					</ul>
				</div>
			</div>

		<?php }else{ ?>

			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-right">
						<li><a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user-o"></i> Iniciar Sesión</a></li>
					</ul>
				</div>
			</div>

		<?php } ?>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="<?= base_url('props/img/logo.png') ?>" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<input class="input" placeholder="Buscar aqui">
								<button class="search-btn">Buscar</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">


							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Productos</a></li>
					<li><a href="#">Clientes</a></li>
					<li><a href="#">Empledos</a></li>
					<li><a href="#">Proveedores</a></li>
					<li><a href="#">Pedidos</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->



<?php }elseif ($this->session->userdata('rol') == 2) {

	?>

	<!-- TOP HEADER -->
	<?php 

	if ($this->session->userdata('rol')) {

		?>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-user-o"></i> email@email.com</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-user-o"></i> Cambiar clave</a></li>
					<li><a href="<?php echo base_url('login_controller/cerrar')?>"><i class="fa fa-user-o"></i> Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>

	<?php }else{ ?>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-right">
					<li><a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user-o"></i> Iniciar Sesión</a></li>
				</ul>
			</div>
		</div>

	<?php } ?>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="#" class="logo">
							<img src="<?= base_url('props/img/logo.png') ?>" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form>
							<input class="input" placeholder="Buscar aqui">
							<button class="search-btn">Buscar</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">


						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Productos</a></li>
				<li><a href="#">Clientes</a></li>
				<li><a href="#">Proveedores</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->




<?php }elseif ($this->session->userdata('rol') == 3) {

	?>

	<!-- TOP HEADER -->
	<?php 

	if ($this->session->userdata('rol')) {

		?>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-user-o"></i> email@email.com</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-user-o"></i> Cambiar clave</a></li>
					<li><a href="<?php echo base_url('login_controller/cerrar')?>"><i class="fa fa-user-o"></i> Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>

	<?php }else{ ?>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-right">
					<li><a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user-o"></i> Iniciar Sesión</a></li>
				</ul>
			</div>
		</div>

	<?php } ?>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="#" class="logo">
							<img src="<?= base_url('props/img/logo.png') ?>" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form>
							<input class="input" placeholder="Buscar aqui">
							<button class="search-btn">Buscar</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">

						<!-- Cart -->
						<div class="dropdown">
							<a data-toggle="modal" data-target="#carrito">
								<i class="fa fa-shopping-cart"></i>
								<span>Carrito</span>
								<div class="qty">3</div>
							</a>
						</div>
						<!-- /Cart -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="active"><a href="<?= base_url('home_controller') ?>">Home</a></li>
				<li><a href="<?= base_url('home_controller/monitores') ?>">Monitores</a></li>
				<li><a href="<?= base_url('home_controller/teclados') ?>">Teclados</a></li>
				<li><a href="<?= base_url('home_controller/mouses') ?>">Mouses</a></li>
				<li><a href="<?= base_url('home_controller/cpu') ?>">CPUs</a></li>
				<li><a href="<?= base_url('home_controller/ups') ?>">UPS</a></li>
				<li><a href="<?= base_url('home_controller/impresoras') ?>">Impresoras</a></li>
				<li><a href="#">Mis Pedidos</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->

<?php }else{ ?>

	<!-- TOP HEADER -->
	<?php 

	if ($this->session->userdata('rol')) {

		?>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-user-o"></i> email@email.com</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-user-o"></i> Cambiar clave</a></li>
					<li><a href="<?php echo base_url('login_controller/cerrar')?>"><i class="fa fa-user-o"></i> Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>

	<?php }else{ ?>

		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-right">
					<li><a data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-user-o"></i> Iniciar Sesión</a></li>
				</ul>
			</div>
		</div>

	<?php } ?>
	<!-- /TOP HEADER -->

	<!-- MAIN HEADER -->
	<div id="header">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- LOGO -->
				<div class="col-md-3">
					<div class="header-logo">
						<a href="#" class="logo">
							<img src="<?= base_url('props/img/logo.png') ?>" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
						<form>
							<input class="input" placeholder="Buscar aqui">
							<button class="search-btn">Buscar</button>
						</form>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">

						<!-- Cart -->
						<div class="dropdown">
							<a data-toggle="modal" data-target="#carrito">
								<i class="fa fa-shopping-cart"></i>
								<span>Carrito</span>
								<div class="qty">3</div>
							</a>
						</div>
						<!-- /Cart -->

						<!-- Menu Toogle -->
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
						<!-- /Menu Toogle -->
					</div>
				</div>
				<!-- /ACCOUNT -->
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	</div>
	<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li class="active"><a href="<?= base_url('home_controller') ?>">Home</a></li>
				<li><a href="<?= base_url('home_controller/monitores') ?>">Monitores</a></li>
				<li><a href="<?= base_url('home_controller/teclados') ?>">Teclados</a></li>
				<li><a href="<?= base_url('home_controller/mouses') ?>">Mouses</a></li>
				<li><a href="<?= base_url('home_controller/cpu') ?>">CPUs</a></li>
				<li><a href="<?= base_url('home_controller/ups') ?>">UPS</a></li>
				<li><a href="<?= base_url('home_controller/impresoras') ?>">Impresoras</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->
</nav>
<!-- /NAVIGATION -->


<?php } ?>







<!--modal, se coloca aqui por que la navbar esta presente en todas las pantallas -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-close"></i>
				</button>
				<h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
			</div>
			<div class="modal-body">
				<!-- inicio formulario, se envian los datos del usuario y contraseña -->
				<form action="<?php echo base_url('login_controller/iniciar') ?>" method="post" autocomplete="off">


					<div class="form-group mb-5 mt-3 mx-4">
						<label for="exampleInputEmail1" style="font-family: Bahnschrift">Usuario</label>
						<input type="text" name="usuario" id="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite su usuario">

					</div>
					<div class="form-group mb-5 mx-4">
						<label for="exampleInputPassword1" style="font-family: Bahnschrift">Contraseña</label>
						<input type="password" name="clave" id="clave" class="form-control" id="exampleInputPassword1" placeholder="Digite la contraseña">
					</div>
					<div class="text-center">
						<button type="submit" name="" class="btn btn-primary" data-target="#exampleModalCenter">Ingresar</button></div>
					</form>


					<!-- fin formulario -->
				</div>
				<div class="modal-footer mx-4">
					<div class="text-center">
						<a href="#" class="text-muted">Registrarme</a>
					</div>
					<br>
					<div class="text-center">
						<a href="#" class="text-muted">¿Olvidó la contraseña?</a>
					</div>
				</div>
			</div>
		</div>
		<?php if (isset($mensaje)){ echo $mensaje; } ?>
	</div>
	<?php $this->load->view('utils/alertsLogin') ?>



	<!-- Modal del carrito de compra -->
	<div class="modal fade bd-example-modal-lg" id="carrito" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h3>Tu compra</h3>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<br>
							<?php if (!$this->session->userdata('rol')) {

								?>
								<span class="badge badge-pill badge-danger"><i class="fa fa-warning (alias)">&nbsp</i>Debe iniciar sesion para poder registrar la compra</span>
							<?php } ?>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-sm">
									<tr>
										<th width="40%">Descripción</th>
										<th width="10%">Cantidad</th>
										<th width="15%">Precio</th>
										<th width="15%">Total</th>
										<th width="5%">Quitar</th>
									</tr>

									<?php

									if(isset($_GET['quitar'])){
										foreach ($this->cart->contents() AS $key => $value){
											if($value['rowid'] == $_GET['quitar']){
												$borrar = array(
													'rowid' => $_GET['quitar'],
													'qty'   => 0
												);
												$this->cart->update($borrar);
												echo '<script>alert("El Producto Fue Eliminado!");</script>';
												echo '<script>window.location.href = "home_controller" ;</script>';
											}
										}
									}  


									if(!empty($this->cart->contents())){
										$total = 0;
										foreach ($this->cart->contents() AS $key => $value){?>

											<tr>
												<td><?= $value['name'];?></td>
												<td><?= $value["qty"];?></td>
												<td>$<?= $this->cart->format_number($value["price"]);?></td>
												<td>$<?php echo number_format($value["qty"] * $value["price"],2);?></td>
												<td><a class="btn btn-danger" href="?quitar=<?= $value["rowid"];?>">Quitar</a></td>
											</tr>
											<?php
											$data = array('total' => $total =$this->cart->format_number($this->cart->total())); 
										}
										$this->session->set_userdata($data);
										?>
										<tr style="color: black">
											<td  colspan="3" align="right"><strong>Sub Total</strong></td>
											<td>$<strong style="color:green;"><?=$this->cart->format_number($this->cart->total());?></strong></td>
											<td></td>
										</tr>

										<form action="<?= base_url('home_controller/comprar') ?>" method="POST" onsubmit="return validar()">
											<tr>
												<td>
													<select name="tipo_pago" id="tipo_pago" class="custom-select">
														<option value="">-- Seleccione un metodo de pago--</option>
														<?php foreach($tipo_pago as $tp){ ?>
															<option value="<?= $tp->id_tipo_pago ?>"><?= $tp->nombre_tipo_pago ?></option>
														<?php } ?>

													</select>
												</td>
												<td> 
													<input type="submit" name="carrito" value="Comprar" class="btn btn-primary">
												</td>
											</tr>
										</form>

										<?php

									}else{

										?>
										<tr style="color: white">
											<td colspan="4" style="color: red" align="center"><strong>No hay Producto Agregado!</strong></td>
										</tr>
										<?php

									}

									?>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>

		function validar(){

			var tipo_pago = document.getElementById('tipo_pago').selectedIndex;

			if (tipo_pago == 0) {

				document.getElementById("tipo_pago").style.boxShadow = "0 0 15px red";
				document.getElementById("tipo_pago").placeholder = "Seleccione tipo de pago";

				return false;
			}else{

				document.getElementById("tipo_pago").style.boxShadow = "0 0 15px green";
			}

			return true;
		}

	</script>