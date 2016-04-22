<?php
@session_start();
include("../../sql/class.data.php");

$data= new data();
$params=$_POST;
$params["id_usuario"] = $_SESSION["id_usuario"];

$params["accion"] = 'Se cambio el estado de marca, al estado: '.$params["txtEstado"].'';

		$sql="UPDATE marca SET estado=:txtEstado WHERE id_marca=:txtId2";
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

echo json_encode($response);
?>