<?php
@session_start();
include("../../sql/class.data.php");
$data= new data();

$params=$_POST;
$params["id_usuario"] = $_SESSION["id_usuario"];
$params["accion"] = 'Se creo una marca con el nombre: '. $params["txtMarca"].'';

$sql = "SELECT marca FROM marca WHERE marca=:txtMarca";
$parametros = array("txtMarca");
$result = $data->query($sql, $params, $parametros);
if ($result['total'] > 0) {
    $response = array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Esta marca ya existe');
} else {
	$sql = "INSERT INTO marca (marca, fecha_creacion) VALUES (:txtMarca, NOW())";
	$param_list = array("txtMarca");
	$response = $data->query($sql, $params, $param_list, true);


	if ($response['insertId'] == 0) {
	   $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'No se guardo el registro');
	}else{
		
		$sql = "INSERT INTO bitacora(accion, tipo_accion, fecha_procesamiento, id_usuario) VALUES (:accion, 1, NOW(), :id_usuario)";
                $param_bitacora = array("accion","id_usuario");
                $response_bitacora = $data->query($sql, $params, $param_bitacora, true);

		$response=array('success'=>true, 'titulo'=>'Operación exitosa!', 'mensaje'=>'Se creo marca');
	}

 }
echo json_encode($response);
?>