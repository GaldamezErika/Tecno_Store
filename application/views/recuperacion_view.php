
<body>

	<?php $this->load->view('nabvar'); ?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- Outer Row -->

			<!-- Nested Row within Card Body -->
			<div class="row">

				<div class="col-lg-6">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
							<p class="mb-4">Lo entendemos, pasan cosas. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña</p>
						</div>
						<form class="user" action="<?php echo base_url().'sendCorreoController/index' ?>" method="POST" onsubmit = " return validar()">

							<div class="form-group">
								<input type="text" class="form-control form-control-user" name="correo" id="correo" placeholder="Ingrese su correo">
							</div>
							<button value="Ingresar" class="btn btn-primary btn-user btn-block">
								Recuperar Cuenta
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" data-toggle="modal" data-target="#exampleModalCenter">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
	<?php $this->load->view('utils/alertsLogin.php') ?>

	<script>
		function validar(){

			var correo = document.getElementById('correo').value;

			if (!(/\S+@\S+\.\S+/.test(correo))) {

				document.getElementById('correo').style.boxShadow = "0 0 15px red";
				document.getElementById('correo').placeholder = "Ingrese correo";

				return false;
			}else{

				document.getElementById('correo').style.boxShadow = "0 0 15px green";
			}

			return true;
		}
	</script>