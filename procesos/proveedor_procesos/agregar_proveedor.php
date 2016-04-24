<?php
@session_start();
include("../../sql/class.data.php");
$data= new data();

$params=$_POST;
$params["id_usuario"] = $_SESSION["id_usuario"];
$params["accion"] = 'Se agrego un nuevo proveedor '. $params["txtNombre"].'';

$sql = "SELECT nombre FROM proveedor WHERE codigo=:txtApellido AND dui=:txtDui AND NIT=:txtNit AND ncr=:txtNcr";
$parametros = array("txtApellido","txtDui","txtNit","txtNcr");
$result = $data->query($sql, $params, $parametros);


if ($result['total'] > 0) {
    $response = array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Ya existe un proveedor con este codigo');
} else {
	$sql = "INSERT INTO proveedor (codigo, nombre, apellido, dui, nit, ncr, direccion, email) VALUES (:txtcodigo, :txtNombre, :txtApellido, :txtDui, :txtNit, :txtNcr, :txtEmail)";
	$param_list = array("txtcodigo", "txtNombre", "txtApellido", "txtDui", "txtNit","txtNcr", "txtEmail");
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