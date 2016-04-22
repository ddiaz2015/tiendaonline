
<section class="col-md-12" >
          <ul class="breadcrumb" style="margin-top: -14px; margin-left: -30px; margin-right: -30px">
            <a href="?mod=agregar_usuario"><i class="fa fa-user-plus"></i> Agregar Usuario</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;            
          </ul>
</section>

<div class="col-md-12">
    <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Usuarios</h3>
                  <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead style="background:#3c8dbc; color:#FFF;">
                      <tr>
                        <th>N°</th>
                        <th>Empleado</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <?php
                $cont = 1;  
                if ($_SESSION["id_rol"] == 1) {
                    $response = $dataTable->obtener_Usuarios(); 
                }else{
                    $response = $dataTable->obtener_Usuarios($_SESSION["id_usuario"]);
                }
?>
                    <tbody id="usuario_tbody">                     
                     <?php    
                    foreach($response['items'] as $datos){?>
                    <tr>
                      <td>
                        <?php echo $cont ?>
                    </td>
                     <td>
                        <?php echo $datos['nombre_completo'] ?>
                    </td>
                    <td>
                        <?php echo $datos['usuario'] ?>
                    </td>
                    <td>
                    <?php $clase = ($datos['estado'] == 'Inactivo') ? 'label label-danger': 'label label-success'; ?>
                        <center><span class="<?php echo $clase ?>"><?php echo $datos['estado'] ?>
                        </span></center>
                        <?php //echo $datos['estado'] ?>
                    </td>
                    <td>
                       <form action="?mod=modificarUsuario" method="POST">
                      <div class="btn-group">                    

                      <a class="btn btn-warning" href="#" style="margin-right: 4px;" data-rel="tooltip" title='Reestablecer contraseña' onclick="reset_pass(<?php echo $datos['id_usuario'] ?>);"> <i class="fa fa-unlock-alt"></i>
                      </a>

                      <a class="btn btn-success" href="#"  style="margin-right: 4px;"  data-toggle='modal' data-target='#cambio_estado' data-rel="tooltip" title="Modificar estado" onclick="modificar_estado(<?php echo $datos['id_usuario'] ?>, '<?php echo $datos['nombre_completo'] ?>','<?php echo $datos['estado'] ?>','<?php echo $datos['usuario'] ?>');"><i  class="fa fa-user-times"></i></a>

                        <input type="hidden" name="id" value="<?php echo $datos['id_usuario'] ?>"></input>
                        <button type="submit" class="btn btn-primary" data-rel="tooltip" title="Modificar usuario"><i class="fa fa-edit"></i></button>
                       </form>
                 
                </div>
                    </td>

                    </tr>

                     <?php  
                $cont ++;
                } ?>
                    </tbody>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
</div>

<!-- ventanas modal -->
<!-- Modal cambio de estado-->
<div class="modal fade" id="cambio_estado" tabindex="-1" role="dialog" aria-labelledby="cambio_estado">
  <div class="modal-dialog" role="document" style="overflow-y; max-height:85%; margin-top: 50px; margin-bottom:50px;">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><b>
        <h4 class="modal-title" id="restablecer" style="color:#FFF;">Cambio de estado</h4>
        </b></center>
      </div>
      <div class="modal-body">
          <div class="box-body" style="padding:20px;">          
            <form role="form" method="POST" name="frmEstado" id="frmEstado" onsubmit="return false">
              <input type="hidden" id="txtId2" name="txtId2">
              <div class="form-group">
                <h4 style="font-weight: bold;">Empleado:&nbsp;&nbsp; <label style="color:blue;" name="txtNombre_Completo" id="txtNombre_Completo"></label></h4>
                <h4 style="font-weight: bold;">Usuario:&nbsp;&nbsp; <label style="color:blue;" name="txtUsuario" id="txtUsuario"></label></h4>
              </div>
              <div class="form-group">
                <label>Estado:</label>
                <select name="txtEstado" id="txtEstado" class="form-control" placeholder="Seleccione un Estado" required="true">
                  <option value="">Selecione un estado </option>
                  <option value="Activo">Activo</option>
                  <option value="Inactivo">Inactivo</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer" style="background:#d2d6de;">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="guardarEstado" name="guardarEstado" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>


<script type="text/javascript">
//restablecer contraseña
function reset_pass(id){
    bootbox.confirm("¿Desea restablecer contraseña?", function(result) { 
        if(result == true){ 
            $.ajax({
              type:"POST",
              url:"procesos/usuario_procesos/restablecer_contrasena.php",
              data: {'id': id},
              dataType:"json",
              success: function(response){
                      if(response.success){
                          bootbox.alert(response.msg, function() { location.reload(); });
                         
                      } else{
                          alert(response.msg);
                      }
                  }
            });
        }
    });
}

//Funcion para cargar los campos de la ventana modal
function modificar_estado(id_usuario, nombre_completo, estado, usuario) {
    document.getElementById('txtId2').value = id_usuario;
   // document.getElementById('txtNombre_Completo').value = nombre_completo;
   document.getElementById('txtNombre_Completo').innerHTML =nombre_completo;
    document.getElementById('txtEstado').value = estado;
      document.getElementById('txtUsuario').innerHTML =usuario;
}

// Funcion que nos permitira cambiar el estado del usuario
$(document).ready(function () {
    $('#guardarEstado').click(function () {
        var formulario = $('#frmEstado').serializeArray();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'procesos/usuario_procesos/modificar_estado_usuario.php',
            data: formulario,
        }).done(function (response) {
            if(response.success == false) {
                bootbox.alert(response.mensaje, function() { location.reload(); });
            }else{
                  bootbox.alert(response.mensaje, function() { location.href = "?mod=usuarios"; });
            }
        });
    });
});
</script>