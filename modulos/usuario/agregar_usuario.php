<section class="col-md-12">
          <ul class="breadcrumb"  style="margin-top: -14px; margin-left: -30px; margin-right: -30px">
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
                <form role="form" method="POST" name="frmUsuario" onSubmit="return false" id="frmUsuario" autocomplete="off" enctype="multipart/form-data" onsubmit="return false"> 
                <div class="form-group">
                  <label>Empleado: </label>
                  <select class="form-control" name="txtEmpleado" id="txtEmpleado" placeholder="Seleccione un empleado" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo">                   
                  </select>
                 </div>
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Nombre usuario:</label>                
                    <input class="form-control" id="txtUsuario"  name="txtUsuario" placeholder="Escriba el nombre del usuario" data-validation="required" data-validation-error-msg="rellene este campo">                 
                  </div><!-- /.form group -->
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Cargo:</label>                
                    <input class="form-control" id="txtCargo"  name="txtCargo" placeholder="Escriba el cargo delempleado" data-validation="required" data-validation-error-msg="rellene este campo">                 
                  </div><!-- /.form group -->

                  <div class="form-group">
                  <label>Rol: </label>
                  <select class="form-control" name="txtRol" id="txtRol" placeholder="Seleccione un rol" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo" >                   
                  </select>
                 </div>
                 <div class="box-footer">
                      <button type="button" onClick='location.href="?mod=usuarios"' class="btn btn-movil btn-danger">Cancelar</button>
                      <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>
                     </div>
                 </form>  
                </div><!-- /.box-body -->
              </div><!-- /.box -->    
</div>

<script type="text/javascript">
  //Funcion para llenar el combo empleado
$(document).ready(function () {
   $.post("Procesos/usuario_procesos/store_usuario.php",
        function(data){
        var data=JSON.parse(data);
        var resultado=data.items;
        var total=resultado.length;
        var opciones;
        var opciones='<option value="">Seleccione un empleado</option>';
        for(var i=0; i<total; i++){
            opciones+="<option value='"+resultado[i].id_empleado+"'>"+resultado[i].nombre_completo+"</option>";
        }
        $('#txtEmpleado').html(opciones);
        $('#txtEmpleado').select2();
    });         
});

//Funcion para llenar el combo rol
$(document).ready(function () {
   $.post("Procesos/usuario_procesos/store_rol.php",
        function(data){
        var data=JSON.parse(data);
        var resultado=data.items;
        var total=resultado.length;
        var opciones;
        var opciones='<option value="">Seleccione un rol</option>';
        for(var i=0; i<total; i++){
            opciones+="<option value='"+resultado[i].id_rol+"'>"+resultado[i].rol+"</option>";
        }
        $('#txtRol').html(opciones);
        $('#txtRol').select2();
    });         
});


 // Funcion que nos permitira mandar los datos a ingresar
$(document).ready(function () {
    $('#guardar').click(function () {
        $.validate({
            onSuccess : function(form) {
                var formulario = $('#frmUsuario').serializeArray();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'procesos/usuario_procesos/agregar_usuario.php',
                    data: formulario,
                 }).done(function (response) {
                    if(response.success == true) {
                        bootbox.alert(response.mensaje, function() { location.href = "?mod=usuarios"; });
                    }else{   
                        bootbox.alert(response.mensaje, function() {  });
                    }
                });
            }
        });
    });
});

</script>