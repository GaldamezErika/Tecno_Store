
<script src="<?php echo base_url('props/js/registrar.js') ?>"></script>
<?php $this->load->view("validar/usuarioUnico") ?>
<?php $this->load->view("validar/correoRegistrar") ?>
<body>

	<?php $this->load->view('nabvar'); ?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<h2>Registrar Cuenta</h2>
				<br>
				<br>
				<form action="<?php echo base_url('registrar_controller/ingresar') ?>" method="POST" autocomplete="off" onsubmit=" return validarFormulario()">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Nombre</label>
								<input type="text" placeholder="Ingrese nombre" name="nombre" id="nombre2" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Apellido</label>
								<input type="text" placeholder="Ingrese apellido" name="apellido" id="apellido2" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Sexo</label>
								<select name="sexo" id="sexo2" class="form-control">
									<option value="">Seleccione sexo</option>
									<?php foreach($sexo as $s){ ?>
										<option value="<?= $s->id_sexo ?>"><?= $s->nombre_sexo ?></option>
									<?php } ?>
								</select>
							</div>		
						</div>					
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Dirección</label>
								<input type="text" placeholder="Ingrese dirección" name="direccion" id="direccion2" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Departamento</label>
								<select name="departamento" id="pais2" class="form-control">
									<option value="">Seleccione departamento</option>
									<?php foreach($departamento as $p){ ?>
										<option value="<?= $p->id_departamento  ?>"><?= $p->nombre_departamento  ?></option>
									<?php } ?>
								</select>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Teléfono</label>
								<input type="text" placeholder="Ingrese teléfono" name="telefono" id="telefono2" class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Correo</label>
								<input type="text" placeholder="Ingrese correo" name="correo" id="correo2" class="form-control">
								<div id="infoCorreo"></div>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Usuario</label>
								<input type="text" placeholder="Ingrese usuario" name="usuario" id="usuario3" class="form-control">
								<div id="infoUsuario"></div>
							</div>	
						</div>		
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Contraseña</label>
								<button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
								<input type="password" placeholder="Ingrese contraseña" name="clave10" id="contrasenna" class="form-control">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Verifique Contraseña</label>
								<button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
								<input type="password" placeholder="Verifique contraseña" name="clave11" id="clave11" class="form-control">
								<label id="msgv"></label>
							</div>	
						</div>
						<div class="row">	
							<div class="col-sm-6 form-group">
								<ul style="list-style-type:circle;">
									<li id="mayuscula" class="invalid">Al menos <strong>una mayuscula</strong></li>
									<li id="especial" class="invalid">Al menos <strong>un caracter especial</strong></li>
									<li id="numero" class="invalid">Al menos <strong>un numero</strong></li>
									<li id="length" class="invalid">Por lo menos <strong>8 caracteres</strong></li>
								</ul>
							</div>	
							<div class="col-sm-6 form-group">
								<input type="submit" value="Registrar" class="btn btn-lg btn-primary">		
							</div>
						</div>
												
					</div>
				</form> 
				
				<?php if (isset($mensaje)){ echo $mensaje; } ?>
			</div>
			<!-- /row -->
			<?php $this->load->view('utils/alertsRegistrar') ?>
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
