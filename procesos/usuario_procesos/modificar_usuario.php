<?php
@session_start();
include("../../sql/class.data.php");

$params=$_POST;
$data= new data();

$sql="SELECT usuario From usuario WHERE usuario=:txtUsuario AND id_usuario <> :txtId";
$param_list = array("txtId", "txtUsuario");
$verificar = $data->query($sql, $params, $param_list, true);

if($verificar['total'] > 0){
     $response = array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Este usuario ya ha sido asignado a otro empleado');

}else{

    $sql = "UPDATE usuario SET cargo=:txtCargo, usuario=:txtUsuario, id_rol=:txtRol, fecha_modificacion=NOW() WHERE id_usuario = :txtId";
    $param_list = array("txtCargo", "txtUsuario", "txtRol", "txtId");
    $response = $data->query($sql, $params, $param_list, true);    


if ($response['total'] > 0) {
    $response = array("success"=>true, 'titulo'=>'Operacion exitosa!', 'mensaje'=>'Se modifico el usuario');
} else {
    $response = array('success'=>false, 'titulo'=>'Verifique su informacion!', 'mensaje'=>'No se modifico el usuario');
}
}
echo json_encode($response);
?>