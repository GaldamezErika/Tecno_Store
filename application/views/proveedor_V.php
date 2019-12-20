<?php $this->load->helper('validacionproveedor'); ?>
<?php $this->load->helper('ajax_proveedor') ?>

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
          <button type="button" class="btn btn-primary" style="float: right;" id="nuevoProveedor"><i class='fa fa-th-list'></i>
            Nuevo Proveedor
          </button>
          <h2>Proveedores</h2>
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
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody id="tabla_proveedor">

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
<div class="modal fade" id="proveedor">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>

      <!-- Modal body -->
      <div class="container">
      <div class="modal-body">
        <form id="formProve" action="" method="POST">
          <input type="hidden" name="id_proveedor" id="id" value="0">
          <div class="row">
            <div class="col">
              <div class="input-group">
                <span class="input-group-text" >Nombre</span>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="nombre" id="nombre" placeholder="Ingrese nombre">
              </div>
            </div>
            <div class="col">
              <div class="input-group">
                <span class="input-group-text">Apellido</span>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="apellido" id="apellido" placeholder="Ingrese apellido">
              </div>
            </div>
          </div>
          <div class="row my-3">
            <div class="col">
              <div class="input-group">
                <span class="input-group-text">Telefono</span>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="telefono" id="telefono">
              </div>
            </div>
          </div>
        </form>             
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cerrar</button>
      </div>
    </div>
  </div>
</div>  
<!--ingresar-->

<script>
  $(document).ready(function() {
    $('#proveedoress').DataTable();
  } );
</script>
