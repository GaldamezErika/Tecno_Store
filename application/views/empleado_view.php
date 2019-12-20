<?php $this->load->helper('ajax_empleado'); ?>
<?php $this->load->helper('validacionesempleado') ?>



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
          <button type="button" class="btn btn-primary" style="float: right;" id="nuevoempleado"><i class='fa fa-th-list'></i>
            Nuevo Empleado
          </button>
          <h2>Empleados</h2>
        </div>
        <br>
        <br>
        <div class="card-body">
          <div class="table-responsive">
            <table id="proveedoress" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Sexo</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody id="tabla_empleado">

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


<!--ingresar-->
<!-- The Modal -->
<div class="modal fade" id="empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="formempleado" action="" method="POST" class="mx-auto">
        <div class="modal-header">

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_cliente" id="id" value="0">
          <div class="col">
            <div class="input-group">
              <span class="input-group-text" >Nombre</span>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="nombre" id="nombre" placeholder="Ingrese nombre">
            </div>
          </div><br>

          <div class="col">
            <div class="input-group">
              <span class="input-group-text" >Apellido</span>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="apellido" id="apellido" placeholder="Ingrese apellido">
            </div>
          </div><br>

          <div class="col">
            <div class="input-group">
              <span class="input-group-text" >Telefono</span>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="telefono" id="telefono" placeholder="Ingrese telefono">
            </div>
          </div>
          <br>
          <div class="col">
            <div class="input-group">
              <span class="input-group-text" >Correo</span>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="correo" id="correo" placeholder="Ingrese correo">
            </div>
            <div id="infoCorreo"></div>
          </div>
          <br>
          <div class="col">
            <div class="input-group">
              <span class="input-group-text">Sexo</span>
              <select name="sexo" id="sexo" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <option value="">Seleccione sexo</option>
              </select>
            </div>
          </div>
          <br>
          <div class="col">
            <div class="input-group">
              <span class="input-group-text">Usuario</span>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="usuario" id="usuario2" placeholder="Ingrese usuario">
              <div id="infousuario"></div>
            </div>
          </div>
          <br>
          <div class="col" id="clave2">
            <div class="input-group">
              <span class="input-group-text">Clave</span>
              <input type="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="clave" id="contrasenna" placeholder="Ingrese clave">
              <button id="show_password" class="btn btn-info" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
          </div>
          <br>
          <div class="col" id="letras">
            <div id="pswd_info">
              <ul>
                <li id="mayuscula" class="invalid">Al menos <strong>una mayuscula</strong></li>
                <li id="especial" class="invalid">Al menos <strong>un caracter especial</strong></li>
                <li id="numero" class="invalid">Al menos <strong>un numero</strong></li>
                <li id="length" class="invalid">Por lo menos <strong>8 caracteres</strong></li>
              </ul>
            </div>
          </div>
          <div id="pswd_info"></div>
          <br>
          <div class="col">
            <div class="input-group">
              <span class="input-group-text">Rol</span>
              <select name="rol" id="rol" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <option value="">Seleccione rol</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--ingresar-->

<script>
  $(document).ready(function() {
    $('#proveedoress').DataTable();
  } );
</script>