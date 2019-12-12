<!-- <?php// $this->load->helper('ajax_home') ?> -->

<body>
	<?php $this->load->view('nabvar'); ?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="<?= base_url('props/img/shop01.png') ?>" alt="">
						</div>
						<div class="shop-body">
							<h3>Catálogo<br>Monitores</h3>
							<a href="#" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="<?= base_url('props/img/shop03.png') ?>" alt="">
						</div>
						<div class="shop-body">
							<h3>Catálogo<br>Impresoras</h3>
							<a href="#" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="<?= base_url('props/img/shop02.png') ?>" alt="">
						</div>
						<div class="shop-body">
							<h3>Catálogo<br>CPUs</h3>
							<a href="#" class="cta-btn">Compra ahora <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Nuevos productos</h3>
						<div class="section-nav">
						</div>
					</div>
					<!-- /section title -->

					<!-- product -->
					<div id="productos">

						<?php foreach($productos as $prod){ ?>

							<div class="col-md-3 col-xs-6" id="productos">
								<div class="product">
									<div class="product-img">
										<img src="http://localhost/tecno_store/props/img/<?= $prod->imagen ?>" alt="">
										<div class="product-label">
											<span class="new">Nuevo</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?= $prod->nombre_categoria ?></p>
										<h3 class="product-name"><?= $prod->descripcion ?></h3>
										<h4 class="product-price">$<?= $prod->precio_venta ?></h4>
										<div class="product-btns">
										</div>
									</div>
									<div class="add-to-cart">	
										<a href="<?php echo base_url('home_controller/get_datos/'.$prod->id_producto) ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ver Detalles</button></a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

				</div>
				<!-- /product -->

				<div class="clearfix visible-sm visible-xs"></div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
								</div>
							</li>
							<li>
								<div>
								</div>
							</li>
							<li>
								<div>
								</div>
							</li>
							<li>
								<div>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase">OFERTA CALIENTE ESTA SEMANA</h2>
						<p>HASTA 50% DE DESCUENTO</p>
						<a class="primary-btn cta-btn" href="#">Compra ahora</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->


	
