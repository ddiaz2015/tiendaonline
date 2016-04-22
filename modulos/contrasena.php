<script language="javaScript">
    $(document).ready(function () {
        $.validate({
            modules : 'security',
            onModulesLoaded : function() {
                var optionalConfig = {
                    fontSize: '9pt',
                    padding: '4px',
                    bad : 'Débil',
                    weak : 'Media',
                    good : 'Buena',
                    strong : 'Fuerte'
                };
                $('#txtPassword').displayPasswordStrength(optionalConfig);
            }
        });
    }); 

//funcion para comparar contraseñas
    function checkPass() {
        var pass1 = document.getElementById('txtPassword');
        var pass2 = document.getElementById('txtRePassword');
        var message = document.getElementById('confirmMessage');
        var messageOther = document.getElementById('OtherMessage');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        var otherColor = "#FF8000";
        if (pass1.value.length > 5) {
            if (pass1.value == pass2.value) {
                //pass2.style.backgroundColor = goodColor;
                document.getElementById('guardar').disabled=false;
                messageOther.style.color = otherColor;
                messageOther.innerHTML = ""
                message.style.color = goodColor;
                message.innerHTML = "Contraseñas coinciden!"

            } else {
                document.getElementById('guardar').disabled=true;
                //pass2.style.backgroundColor = badColor;
                messageOther.style.color = otherColor;
                messageOther.innerHTML = ""
                message.style.color = badColor;
                message.innerHTML = "Contraseñas no coinciden!"
               
            }
        } else {
            document.getElementById('guardar').disabled=true;
            message.style.color = goodColor;
            message.innerHTML = ""
            messageOther.style.color = otherColor;
            messageOther.innerHTML = "contraseña muy corta!"

        }
        ;
    }

    //funcion enviar datos a agregar
    $(document).ready(function () {
        $("#guardar").click(function () {
            $.validate({
                onSuccess: function(){
                    //Guardar en variables el valor que tengan las cajas de texto Por medio de los id's Y tener mejor manipulación de dichos valores
                    var formulario = $("#frmContrasena").serializeArray();
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "procesos/usuario_procesos/cambioContrasena.php",
                        data: formulario,
                    }).done(function (response) {
                        if (response.success == false) {
                            bootbox.alert(response.mensaje, function() { });
                        } else {
                            bootbox.alert(response.mensaje, function() {location.href = "?mod=logout"; });
                        }
                    });
                },
            });
        });//click
    });//ready
</script>
<div class="col-md-10">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Modificar contrase&ntilde;a</h3>
               <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
                </div>
                <div class="box-body">
               <form id="frmContrasena"  method="POST" name="frmContrasena" role="form" autocomplete="off" onsubmit="return false">
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label">Contraseña Actual: </label>
                    <input type="password" name="txtActual" class="form-control" id="txtActual" placeholder="Digite su contraseña actual">
                    <p class="help-block" style="height: 8px;"></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label">Nueva Contraseña: </label>
                    <input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="Digite su nueva contraseña" onkeyup="checkPass(); return false;">
                    <p class="help-block" style="height: 8px;"><span id="OtherMessage" class="mensaje"></span></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="control-label">Repetir Nueva Contraseña: </label>
                    <input type="password" name="txtRePassword" class="form-control" id="txtRePassword" placeholder="Digita nuevamente tu nueva contraseña" onkeyup="checkPass(); return false;">
                    <p class="help-block" style="height: 8px;"><span id="confirmMessage" class="mensaje"></span></p>
                </div>
            </div>
            <div class="col-md-12">
                <br />
                 <div class="form-actions">
                        <button type="reset" class="btn btn-primary" id="limpiar" value='Limpiar'>Limpiar</button>
                        <button type='submit' class="btn btn-primary pull-right" id='guardar' value='Guardar'>Guardar</button>
                    </div>
            </div>           
        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->    
</div>