<section class="col-md-12">
<ul class="breadcrumb" style="margin-top: -14px; margin-left: -30px; margin-right: -30px">
  <a href="?mod=productos"><i class="fa fa-archive"></i> Ir a productos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="?mod=tipo_producto"><i class="fa fa-list"></i> Ir a tipo de productos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
</ul>
</section>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar marca</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form role="form" method="POST" name="frmProveedor" onsubmit="return false" id="frmProveedor" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
        <input type="hidden" id="txtId" name="txtId">
        <!-- Date dd/mm/yyyy -->
        <div class="form-group col-lg-12">
          <label>Codigo</label>
          <input class="form-control" id="txtcodigo" name="txtcodigo" placeholder="Escriba el nombre del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
        <div class="form-group col-lg-12">
          <label>Nombre</label>
          <input class="form-control" id="txtNombre" name="txtNombre" placeholder="Escriba el nombre del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
        <div class="form-group col-lg-12">
          <label>Apellido</label>
          <input class="form-control" id="txtApellido" name="txtApellido" placeholder="Escriba el apellido del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
        <div class="selection">
          <div class="form-group col-lg-6">
            <label>DUI</label>
            <input class="form-control" id="txtDui" name="txtDui" placeholder="Escriba el DUI del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
          </div>
          <div class="form-group col-lg-6">
            <label>NIT</label>
            <input class="form-control" id="txtNit" name="txtNit" placeholder="Escriba el NIT del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
          </div>
          </div>
            <div class="selection">
              <div class="form-group col-lg-6">
                <label>NCR</label>
                <input class="form-control" id="txtNcr" name="txtNcr" placeholder="Escriba el NCR del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
              </div>
              <div class="form-group col-lg-6">
                <label>E-mail</label>
                <input class="form-control" type="text" id="txtEmail" name="txtEmail" placeholder="Escriba el email del proveedor" data-validation="required email" data-validation-error-msg="rellene este campo">
              </div>
            </div>
            <div class="selection">
              <div class="form-group col-lg-6">
                <label>Telefono 1</label>
                <input class="form-control" type="text" id="txtTelefono" name="txtTelefono" placeholder="Escriba el email del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
              </div>
              <div class="form-group col-lg-6">
                <label>Telefono 2</label>
                <input class="form-control" type="text" id="txtTelefonno2" name="txtTelefonno2" placeholder="Escriba el email del proveedor" data-validation="required" data-validation-error-msg="rellene este campo">
              </div>
            </div>
            <br><br><br>
            </div>
        
            <!-- /.form group -->
            <!-- Date dd/mm/yyyy -->
            <div class="box-footer">
             <div class="selection">
              <button type="button" onclick='location.href="?mod=crear_marca"' class="btn btn-movil btn-danger">Cancelar</button>
              <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <script type="text/javascript">

    $(function () {
        $.mask.definitions['~'] = "[+-]";
        $("#txtDui").mask("99999999-9");
        $("#txtNit").mask("9999-999999-999-9");
        $("#txtTelefono").mask("9999-9999");
        $("#txtTelefonno2").mask("9999-9999");     
    });

 // Funcion que nos permitira mandar los datos a ingresar
$(document).ready(function () {
    $('#guardar').click(function () {
        $.validate({
            onSuccess : function(form) {
                var formulario = $('#frmProveedor').serializeArray();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'procesos/proveedor_procesos/agregar_proveedor.php',
                    data: formulario,
                 }).done(function (response) {
                    if(response.success == true) {
                        bootbox.alert(response.mensaje, function() { location.href = "?mod=proveedor"; });
                    }else{   
                        bootbox.alert(response.mensaje, function() {  });
                    }
                });
            }
        });
    });
});
</script>