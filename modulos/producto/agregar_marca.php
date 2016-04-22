<section class="col-md-12">
<ul class="breadcrumb" style="margin-top: -14px; margin-left: -30px; margin-right: -30px">
  <a href="?mod=productos"><i class="fa fa-table"></i> Ir a productos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
</ul>
</section>
<div class="col-md-5">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar marca</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form role="form" method="POST" name="frmMarca" onsubmit="return false" id="frmMarca" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
      <input type="hidden" id="txtId" name="txtId">
        <!-- Date dd/mm/yyyy -->
        <div class="form-group">
          <label>Marca</label>
          <input class="form-control" id="txtMarca" name="txtMarca" placeholder="Escriba el nombre de la marca" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
        <!-- /.form group -->
        <!-- Date dd/mm/yyyy -->
        <div class="box-footer">
          <button type="button" onclick='location.href="?mod=crear_marca"' class="btn btn-movil btn-danger">Cancelar</button>
          <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>
          <button type="submit" id="modificar" name="modificar" class="btn btn-success   pull-right">Modificar</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<div class="col-md-7">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Usuarios</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
      <thead style="background:#3c8dbc; color:#FFF;">
      <tr>
        <th>
          N°
        </th>
        <th>
          Marca
        </th>
        <th>
          estado
        </th>
        <th>
          Acciones
        </th>
      </tr>
      </thead>
      <?php
      $cont = 1;  
      if ($_SESSION["id_rol"] == 1) {
            $response = $dataTable->obtener_marca(); 
          }else{ 
            $response = $dataTable->obtener_marca($_SESSION["id_usuario"]); 
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
          <?php echo $datos['marca'] ?>
        </td>
        <td>
          <?php $clase = ($datos['estado'] == 'Inactivo') ? 'label label-danger': 'label label-success'; ?>
          <center><span class="<?php echo $clase ?>"><?php echo $datos['estado'] ?>
          </span></center>
        </td>
        <td>
          <div class="btn-group">
            <a class="btn btn-warning" href="#" style="margin-right: 4px;" data-toggle='modal' data-target='#cambio_estado_marca' data-rel="tooltip" title="Modificar estado de marca" onclick="modificar_estado_marca('<?php echo $datos['id_marca'] ?>', '<?php echo $datos['marca'] ?>', '<?php echo $datos['estado'] ?>');"><i class="fa fa-user-times"></i></a>
            <a class="btn btn-success" href="#" style="margin-right: 4px;" data-rel="tooltip" title="Modificar marca" onclick="modificar_marca(<?php echo $datos['id_marca'] ?>, '<?php echo $datos['marca'] ?>');"><i class="fa fa-edit"></i></a>
          </div>
        </td>
      </tr>
      <?php  
                $cont ++;
                } ?>
      </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- ventanas modal -->
<!-- Modal cambio de estado-->
<div class="modal fade" id="cambio_estado_marca" tabindex="-1" role="dialog" aria-labelledby="cambio_estado_marca">
  <div class="modal-dialog" role="document" style="overflow-y; max-height:85%; margin-top: 50px; margin-bottom:50px;">
    <div class="modal-content">
      <div class="modal-header" style="background:#3c8dbc;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><b>
        <h4 class="modal-title" id="cambio_marca" style="color:#FFF;">Cambio de estado marca</h4>
        </b></center>
      </div>
      <div class="modal-body">
        <div class="box-body" style="padding:20px;">
          <form role="form" method="POST" name="frmEstado" id="frmEstado" onsubmit="return false">
            <input type="hidden" id="txtId2" name="txtId2">
            <div class="form-group">
              <h4 style="font-weight: bold;">Marca:&nbsp;&nbsp; <label style="color:blue;" name="txtNombreMarca" id="txtNombreMarca"></label></h4>
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

  $(document).ready(function () {
       document.getElementById('modificar').style.display = 'none';
    });

//Funcion para cargar los campos de la ventana modal
function modificar_estado_marca(id_marca, marca, estado) {
   document.getElementById('txtNombreMarca').innerHTML = marca;
    document.getElementById('txtId2').value = id_marca;
    document.getElementById('txtEstado').value = estado;
}
 // Funcion que nos permitira mandar los datos a ingresar
$(document).ready(function () {
    $('#guardar').click(function () {
        $.validate({
            onSuccess : function(form) {
                var formulario = $('#frmMarca').serializeArray();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'procesos/producto_procesos/agregar_marca.php',
                    data: formulario,
                 }).done(function (response) {
                    if(response.success == true) {
                        bootbox.alert(response.mensaje, function() { location.href = "?mod=crear_marca"; });
                    }else{   
                        bootbox.alert(response.mensaje, function() {  });
                    }
                });
            }
        });
    });
});
// Funcion que nos permitira cambiar el estado del usuario
$(document).ready(function () {
    $('#guardarEstado').click(function () {
        var formulario = $('#frmEstado').serializeArray();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'procesos/producto_procesos/modificar_estado_marca.php',
            data: formulario,
        }).done(function (response) {
            if(response.success == false) {
                bootbox.alert(response.mensaje, function() { location.reload(); });
            }else{
                  bootbox.alert(response.mensaje, function() { location.href = "?mod=crear_marca"; });
            }
        });
    });
});

//Funcion para cargar los campos de la ventana modal
function modificar_marca(id_marca, marca) {  
    document.getElementById('txtId').value = id_marca;
    document.getElementById('txtMarca').value = marca; 
    //document.getElementById('guardar').disabled=none;
    document.getElementById('guardar').style.display = 'none';
   document.getElementById('modificar').style.display = 'block';
}



 // Funcion que nos permitira mandar los datos a ingresar
$(document).ready(function () {
    $('#modificar').click(function () {
        $.validate({
            onSuccess : function(form) {
                var formulario = $('#frmMarca').serializeArray();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'procesos/producto_procesos/modificar_marca.php',
                    data: formulario,
                 }).done(function (response) {
                    if(response.success == true) {
                        bootbox.alert(response.mensaje, function() { location.href = "?mod=crear_marca"; });
                    }else{   
                        bootbox.alert(response.mensaje, function() {  });
                    }
                });
            }
        });
    });
});
    </script>