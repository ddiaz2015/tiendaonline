  <?php
if (isset($_POST['id'])) {
     $params =  $_POST;
     $sql = "SELECT us.id_usuario, us.cargo, us.usuario, us.id_rol, us.estado, CONCAT(emp.nombre,' ', emp.apellido) AS nombre_completo FROM usuario us INNER JOIN empleado emp ON us.id_empleado = emp.id_empleado WHERE us.id_usuario = :id";
     $param_list = array("id");
     $result = $data->query($sql, $params, $param_list); if ($result["total"] > 0) { ?>
    <!-- start submenu -->
<section class="col-md-12" >
          <ul class="breadcrumb" style="margin-top: -14px; margin-left: -30px; margin-right: -30px">
            <a href="?mod=agregar_usuario"><i class="fa fa-user-plus"></i> Agregar Usuario</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  
            <a href="?mod=usuarios"><i class="fa fa-table"></i> Ir a Usuarios</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;            
          </ul>
</section>
<div class="col-md-10">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar usuario</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form role="form" method="POST" name="frmUsuario" onsubmit="return false" id="frmUsuario" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
        <input type="hidden" id="txtId" name="txtId" value="<?php echo($result['items'][0]['id_usuario']); ?>">
        <div class="form-group">
          <label>Empleado: </label>
          <input type="text" class="form-control" id="txtNombreEmpleado" name="txtNombreEmpleado" value='<?php echo($result['items'][0]['nombre_completo']); ?>' readonly>
        </div>
        <div class="form-group">
          <label>Nombre usuario:</label>
          <input class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Escriba el nombre del usuario" value='<?php echo($result['items'][0]['usuario']); ?>' data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
        <!-- /.form group -->
        <div class="form-group">
          <label>Cargo:</label>
          <input class="form-control" id="txtCargo" name="txtCargo" placeholder="Escriba el cargo delempleado" value='<?php echo($result['items'][0]['cargo']); ?>' data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
        <!-- /.form group -->
        <div class="form-group">
          <label>Rol: </label>
          <select class="form-control" name="txtRol" id="txtRol" placeholder="Seleccione un rol" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo">
          </select>
        </div>
        <div class="box-footer">
          <button type="button" onclick='location.href="?mod=usuarios"' class="btn btn-movil btn-danger">Cancelar</button>
          <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<?php
    }else{
        header('Location:?mod=modificarUsuario');
    }
} else {
    header('Location:?mod=error');
}
?>
<script type="text/javascript">
//Funcion para llenar el combo rol
$(document).ready(function () {
	var rol = "<?php echo $result['items'][0]['id_rol'] ?>";
   $.post("Procesos/usuario_procesos/store_rol.php",
        function(data){
        var data=JSON.parse(data);
        var resultado=data.items;
        var total=resultado.length;
        var opciones;
        var opciones='<option value="">Seleccione un rol</option>';
        for(var i=0; i<total; i++){
        	 if (rol == resultado[i].id_rol) {
                opciones+="<option selected='true' value='"+resultado[i].id_rol+"'>"+resultado[i].rol+"</option>";
            }else{
                opciones+="<option value='"+resultado[i].id_rol+"'>"+resultado[i].rol+"</option>";
            }            
        }
        $('#txtRol').html(opciones);
        $('#txtRol').select2();
    });         
});

// Funcion que nos permitira mandar los datos a ingresar
$(document).ready(function () {
    $('#guardar').click(function () {
        var formulario = $('#frmUsuario').serializeArray();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'Procesos/usuario_procesos/modificar_usuario.php',
            data: formulario,
        }).done(function (response) {
            if(response.success == true) {
                bootbox.alert(response.mensaje, function() { location.href = "?mod=usuarios"; });
            }else{
                bootbox.alert(response.mensaje, function() {  });
            }
        });
    });
});
</script>