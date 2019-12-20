<script>

  $(document).ready(function(){




    mostrarempleado();

    function mostrarempleado(){

      $.ajax({

        type: 'ajax',
        url: '<?= base_url('empleado_controller/get_empleado') ?>',
        dataType: 'json',

        success: function(datos){

          var tabla = '';
          var i;
          var n = 1;

          for(i=0; i<datos.length; i++){

            tabla +=
            '<tr>'+
            '<td>'+n+'</td>'+
            '<td>'+datos[i].nombre+'</td>'+
            '<td>'+datos[i].apellido+'</td>'+
            '<td>'+datos[i].telefono+'</td>'+
            '<td>'+datos[i].correo+'</td>'+
            '<td>'+datos[i].nombre_sexo+'</td>'+
            '<td>'+datos[i].usuario+'</td>'+
            '<td>'+datos[i].nombre_rol+'</td>'+
            '<td>'+
            '<div class="dropdown">'+
            '<button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opcion'+
            '<span class="caret"></span>'+
            '</button>'+
            '<ul class="dropdown-menu">'+
            '<li><a href="javascript:;" class="borrar" data="'+datos[i].id_cliente+'">Eliminar</a></li>'+
            '<li><a href="javascript:;" class="item-edit" data="'+datos[i].id_cliente+'">Editar</a></li>'+
            '</ul>'+
            '</div>'+
            '</td>'+
            '</tr>';

            n++;

          }
          $('#tabla_empleado').html(tabla);
        }
      });
    }; //Fin de funcion mostrar alumnos


        // Para eliminar

        $('#tabla_empleado').on('click', '.borrar', function(){

      $id = $(this).attr('data'); //para capturar el dato segun el boton que demos click

      $('#modalBorrar').modal('show'); //para mostrar el modal

      $('#btnBorrar').unbind().click(function(){
        $.ajax({

          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url('empleado_controller/eliminar') ?>',
          data: {id:$id},
          dataType: 'json',

          success: function(respuesta){
            $('#modalBorrar').modal('hide');
            if(respuesta==true){
              alertify.notify('Eliminado exitosamente', 'success', 10, null );
              mostrarempleado();
            }else{
              alertify.notify('error al eliminar¡', )
            }
          }
        });

      });
    });

        // modal para agregar
        $('#nuevoempleado').click(function(){
          $('#empleado').modal('show');
          $('#empleado').find('.modal-title').text('Nuevo empleado');
          $('#formempleado').attr('action','<?= base_url('empleado_controller/ingresar') ?>');


          status = "add";
          console.log(status);

        });
        get_sexo(); //llamado a la funcion para mostrar sexos

        function get_sexo(){

          $.ajax({
            type: 'ajax',
            url: '<?= base_url('empleado_controller/get_sexo') ?>',
            dataType: 'json',
            success: function(datos){
              var op = '';
              var i;

              op +="<option value=''>---Seleccione sexo---</option>";
              for(i=0; i<datos.length; i++){
                op +="<option value='"+datos[i].id_sexo+"'>"+datos[i].nombre_sexo+"</option>";
              } 
              $('#sexo').html(op);
            }
          });



}//fin de funcion para mos
                 get_rol(); //llamado a la funcion para mostrar sexos

                 function get_rol(){

                  $.ajax({
                    type: 'ajax',
                    url: '<?= base_url('empleado_controller/get_rol') ?>',
                    dataType: 'json',
                    success: function(datos){
                      var op = '';
                      var i;

                      op +="<option value=''>---Seleccione rol---</option>";
                      for(i=0; i<datos.length; i++){
                        op +="<option value='"+datos[i].id_rol+"'>"+datos[i].nombre_rol+"</option>";
                      } 
                      $('#rol').html(op);
                    }
                  });
                }

                $('#btnGuardar').click(function(){
                  $resp = validarFormulario();
                  
                  if($resp == true){
                    $url = $('#formempleado').attr('action');
                    $data = $('#formempleado').serialize();

                    $.ajax({
                      type: 'ajax',
                      method: 'post',
                      url: $url,
                      data: $data,
                      dataType: 'json',

                      success: function(respuesta){
                        $('#empleado').modal('hide');

                        if(respuesta=='add'){
                          alertify.notify('Ingresado exitosamente!','success',10,null);
                        }else if(respuesta=='edi'){
                          alertify.notify('actualizado!','success',10,null);

                        }else{
                          alertify.notify('Error al ingresar!','error',10,null);
                        }
                        $('#formempleado')[0].reset();
                        $("#infoCorreo").text('').css({boxShadow: '0 0 0px white'});
                        $("#correo").css({boxShadow: '0 0 0px white'});
                        
                        $("#infousuario").text('').css({boxShadow: '0 0 0px white'});
                        $("#usuario").css({boxShadow: '0 0 0px white'});

      //actualizar la tabla con el nuevo registro
      
      mostrarempleado();
    }
  });

                  }       
                });


                $('#tabla_empleado').on('click', '.item-edit', function(){
                 var id = $(this).attr('data');

                 $('#empleado').modal('show');
                 $('#clave2').hide();
                 $('#usu').hide();
                 $('#letras').hide();




  //para mostrar el mo
  $('#empleado').find('.modal-title').text('Editar Alumno');
  $('#formempleado').attr('action','<?= base_url('empleado_controller/actualizar') ?>');

  status = "modi";
  console.log(status);

  $.ajax({
    type: 'ajax',
    method: 'post',
    url: '<?= base_url('empleado_controller/get_datos') ?>',
    data: {id:id},
    dataType: 'json',

    success: function(datos){

      $('#id').val(datos.id_cliente);
      $('#nombre').val(datos.nombre);
      $('#apellido').val(datos.apellido);
      $('#telefono').val(datos.telefono);
      $('#correo').val(datos.correo);
      $('#sexo').val(datos.id_sexo);
      $('#usuario2').val(datos.usuario);
      $('#rol').val(datos.id_rol);

    }
  });

});

//**************************************************************************************************************


    //Limpiamos el formulario al clickear cerrar
    $('#cerrar').click(function(){
      $('#formempleado')[0].reset();
    });


//**************************************************************************************************************

});
</script>