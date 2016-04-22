<?php
@session_start();
include("../../sql/class.data.php");

$data= new data();

$params=$_POST;
$params["reset"] = md5("vj2016");
$sql = "UPDATE usuario SET contrasenia = :reset WHERE id_usuario=:id";
$param_list = array("reset", "id");
$response = $data->query($sql, $params, $param_list, true);
if ($response["success"] == true) {
    $response=array('success'=>true, 'titulo'=>'Operación exitosa!', 'msg'=>'Contraseña reestablecida', 'tipo'=>'alert alert-success');
}else{
    $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'msg'=>'Error', 'tipo'=>'alert alert-danger');
}
echo json_encode($response);
?>