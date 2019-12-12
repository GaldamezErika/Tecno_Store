<!-- <?php// $this->load->helper('ajax_home') ?> -->

<body>

	<?php $this->load->view('nabvar'); ?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php foreach($productos as $pro){ ?>
					<form action="<?= base_url('home_controller/carrito') ?>" method="POST" onsubmit ="return validar()">
						<input type="hidden" name="id" value="<?= $pro->id_producto?>">

						<!-- Product main img -->
						<div class="col-md-7 col-md-pull-1">
							<div id="product-main-img" class="container">
								<div>
									<a href="<?= base_url('props/img/product01.png') ?>" data-fancybox="">
										<img src="http://localhost/tecno_store/props/img/<?= $pro->imagen ?>" id="imagen" alt="">
									</a>
								</div>		
							</div>
						</div>
						<!-- /Product main img -->


						<!-- Product details -->
						<div class="col-md-5">
							<div class="product-details">
								<input type="hidden" name="categoria" value="<?= $pro->nombre_categoria?>">
								<h2><?= $pro->nombre_categoria?></h2>
								<div>
									<input type="hidden" name="precio" value="<?= $pro->precio_venta?>">
									<h3 class="product-price" id="precio">$ <?= $pro->precio_venta?> </h3>
									<span class="product-available">In Stock</span>
								</div>
								<input type="hidden" name="descripcion" value="<?= $pro->descripcion?>">
								<h4 id="descripcion"><?= $pro->descripcion?></h4>

								<input type="hidden" name="especificacion" value="<?= $pro->especificacion?>">
								<p id="descripcion"><?= $pro->especificacion?></p>

								<div class="product-options">
									<label>
										<input type="hidden" name="marca" value="<?= $pro->nombre_marca?>">
										Marca: 
										<p><?= $pro->nombre_marca?></p>
									</label>
								</div>

								<div class="add-to-cart">
									<div class="qty-label">
										
										Cantidad
										<div>
											<input type="number" name="cantidad" id="cantidad" min="1" max="<?= $pro->stock?>">
										</div>
										<label id="msgv"></label>
									</div>

									<button class="add-to-cart-btn" value="agregar"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button> 
								</div>
							</form>
						<?php } ?>
					</div>
				</div>
				<!-- /Product details -->
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script>
	

function validar(){

	var cantidad = document.getElementById('cantidad').value;

	if(cantidad.length == 0){
		document.getElementById("cantidad").style.boxShadow = '0 0 15px red';
		document.getElementById("msgv").innerHTML = "Ingrese cantidad";
        
        return false;
    }else{
        document.getElementById("cantidad").style.boxShadow = '0 0 15px green';
    }

    return true;
}

</script>