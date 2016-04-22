<?php
@session_start();
include("../../sql/class.data.php");

$data= new data();
$params=$_POST;
$params["id_usuario"] = $_SESSION["id_usuario"];

$sql = "SELECT usuario FROM usuario WHERE id_usuario=:txtId2";
$parametros = array("txtId2");
$response = $data->query($sql, $params, $parametros);

$params["accion"] = 'Se cambio el estado del usuario '. $response['items'][0]["usuario"].',  al estado: '.$params["txtEstado"].'';
if ($response['total'] > 0) {

		$sql="UPDATE usuario SET estado=:txtEstado WHERE id_usuario=:txtId2";
		$param_list=array("txtEstado", "txtId2");
		$response=$data->query($sql, $params, $param_list);
		if ($response["success"] == false) {
		   $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'No se puede cambiar el estado', 'tipo'=>'alert alert-danger');
		}else{
			$sql = "INSERT INTO bitacora(accion, tipo_accion, fecha_procesamiento, id_usuario) VALUES (:accion, 2, NOW(), :id_usuario)";
                $param_bitacora = array("accion","id_usuario");
                $response_bitacora = $data->query($sql, $params, $param_bitacora, true);

			$response=array('success'=>true, 'titulo'=>'Operación exitosa!', 'mensaje'=>'Estado modificado', 'tipo'=>'alert alert-success');
		}
} else{
	$response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'No se encontro el usuario', 'tipo'=>'alert alert-danger');
}
echo json_encode($response);
?>