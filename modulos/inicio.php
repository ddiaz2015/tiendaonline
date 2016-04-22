 
 <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent !important;
      }
</style>

<!-- mask -->
<script src="plugins/input-mask/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
 $(function () {
        $.mask.definitions['~'] = "[+-]";
        $("#anyo").mask("9999");
    });
</script>
<!-- ****************************** -->

<!--FUNCION AGREGAR -->
<script type="text/javascript">


/*$(document).ready(function() {
    $('#modal_pieza').modal('show');
    $('#modal_pieza').on('show', function() {
        $("#txtname").focus();
    })
});*/
function abrirTabla () {
  $('#tabla').attr('class','tab-pane active');
    $('#form').attr('class','tab-pane ');
    $('#1').attr('class','active');
    $('#2').attr('class','');
}

function abrirForm () {
  $('#tabla').attr('class','tab-pane');
    $('#form').attr('class','tab-pane active');
    $('#1').attr('class','');
    $('#2').attr('class','active');
}
/*------------------DIV PIEZA----------------------*/

function HabilitarPieza() {
  $('#pieza :input').attr('disabled', false);
}

function deshabilitarPieza() {
  $('#pieza :input').attr('disabled', true);
}
/*--------------------------------------------------*/


$(document).ready(function(){
    $('#pieza :input').attr('disabled', true);
    $('#guardar').click(function(){ 
    
    if(document.getElementById('n_expediente').value == "") {
      bootbox.alert("Debe llenar todos los campos", function() { });
    }else{
      

     
      bootbox.confirm("¿Desea guardar la información?", function(result) { 
        if(result == true){ 
         
             var datos=$('#frmExpediente').serialize();
            $.ajax( {
              type:"POST",
              url:"procesos/guardar_persona.php",
              data: datos,
              dataType:"json",
              success: function(data){
                if(data.success){
                  //recargar la tabla
                  bootbox.alert("Datos guardados correctamente", function() { });
              
    
                  document.getElementById('formUsuario').reset();            
                }else{
                  alert(data.msg);
                  document.getElementById('formUsuario').reset(); 
                }
              }
              
            });
        }
        });
      }
    });
  });
</script>
<!-- ****************************** -->
 <section class="content">
  <?php
 // echo  $_SESSION["id_rol"];
  ?>
</section>