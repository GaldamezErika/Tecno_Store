<!-- NEWSLETTER -->
<div id="newsletter" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					
					<form>
						<h2>Siguenos desde nuestras redes sociales, sera un placer atenderlos.</h2>
					</form>
					<ul class="newsletter-follow">
						<li>
							<a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Acerca de nosotros</h3>
						<p>Somos la mejor tienda en línea de productos tecnológicos en donde ofrecemos a nuestros clientes los mejores y actualizados productos de tecnología.</p>
						<ul class="footer-links">
							<li><a><i class="fa fa-map-marker"></i>1734 Escalón</a></li>
							<li><a><i class="fa fa-phone"></i>2547-5456</a></li>
							<li><a><i class="fa fa-envelope-o"></i>tecnostore@gmail.com</a></li>
						</ul>
					</div>
				</div>

				<?php 

				if ($this->session->userdata('rol') == 1 || $this->session->userdata('rol') == 2) {

					?>
				<?php }else{ ?>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categorías</h3>
							<ul class="footer-links">
								<li><a href="<?= base_url('home_controller/monitores') ?>">Monitores</a></li>
								<li><a href="<?= base_url('home_controller/teclados') ?>">Teclados</a></li>
								<li><a href="<?= base_url('home_controller/mouses') ?>">Mouses</a></li>
								<li><a href="<?= base_url('home_controller/cpu') ?>">CPUs</a></li>
								<li><a href="<?= base_url('home_controller/impresoras') ?>">Impresoras</a></li>
								<li><a href="<?= base_url('home_controller/ups') ?>">UPS</a></li>
							</ul>
						</div>
					</div>

				<?php } ?>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Información</h3>
						<ul class="footer-links">
							<li><a href="#">Acerca de nosotros</a></li>
							<li><a href="#">Contáctanos</a></li>
							<li><a href="#">Políticas de Privacidad</a></li>
							<li><a href="#">Ordenes y retornos</a></li>
							<li><a href="#">Términos y condiciones</a></li>
						</ul>
					</div>
				</div>

				<?php if ($this->session->userdata('rol') == 3) {

					?>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Servicios</h3>
							<ul class="footer-links">
								<li><a href="<?= base_url('ped_cliente_controller/index') ?>">Mis Pedidos</a></li>
								<li><a href="#">Ayuda</a></li>
							</ul>
						</div>
					</div>
				<?php } ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->

	<!-- bottom footer -->
	<div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta tienda esta hecha con  <i class="fa fa-heart-o" aria-hidden="true"></i> by Tecno Store.
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bottom footer -->
</footer>
<!-- /FOOTER -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h4>

			</div>
			<div class="modal-body">Seleccione <strong>"Cerrar sesión"</strong> a continuación si está listo para finalizar su sesión actual.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="<?php echo base_url('login_controller/cerrar')?>">Cerrar sesión</a>
			</div>
		</div>
	</div>
</div>

<!-- jQuery Plugins -->


<script src="<?= base_url('props/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('props/js/slick.min.js') ?>"></script>
<script src="<?= base_url('props/js/nouislider.min.js') ?>"></script>
<script src="<?= base_url('props/js/jquery.zoom.min.js') ?>"></script>
<script src="<?= base_url('props/js/main.js') ?>"></script>

</body>
</html>