<?php
@session_start();
include("../../sql/class.data.php");
$data= new data();

$params=$_POST;
$params["id_usuario"] = $_SESSION["id_usuario"];
$params["accion"] = 'Se creo un tipo de producto con el nombre: '. $params["txtTipo"].'';

$sql = "SELECT tipo FROM tipo_producto WHERE tipo=:txtTipo";
$parametros = array("txtTipo");
$result = $data->query($sql, $params, $parametros);
if ($result['total'] > 0) {
    $response = array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Est tipo ya existe');
} else {
	$sql = "INSERT INTO tipo_producto (tipo, fecha_creacion, estado) VALUES (:txtTipo, NOW(), 1)";
	$param_list = array("txtTipo");
	$response = $data->query($sql, $params, $param_list, true);


	if ($response['insertId'] == 0) {
	   $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'No se guardo el registro');
	}else{
		
		$sql = "INSERT INTO bitacora(accion, tipo, fecha_procesamiento, id_usuario) VALUES (:accion, 1, NOW(), :id_usuario)";
                $param_bitacora = array("accion","id_usuario");
                $response_bitacora = $data->query($sql, $params, $param_bitacora, true);

		$response=array('success'=>true, 'titulo'=>'Operación exitosa!', 'mensaje'=>'Se creo tipo');
	}

 }
echo json_encode($response);
?>