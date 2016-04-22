<?php
@session_start();
include("../../sql/class.data.php");
$data= new data();

$params=$_POST;
$params["id_usuario"] = $_SESSION["id_usuario"];

$params["accion"] = 'Se creo un usuario con el nombre: '. $params["txtUsuario"].'';


$sql = "SELECT usuario FROM usuario WHERE usuario=:txtUsuario";
$parametros = array("txtUsuario");
$result = $data->query($sql, $params, $parametros);
if ($result['total'] > 0) {
    $response = array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'El usuario ya existe');
} else {
	$sql = "INSERT INTO usuario (cargo, usuario, contrasenia, estado, fecha, id_empleado, id_rol) VALUES (:txtCargo, :txtUsuario, md5('vj2016'), 1, NOW(), :txtEmpleado, :txtRol)";
	$param_list = array("txtCargo","txtUsuario", "txtEmpleado", "txtRol");
	$response = $data->query($sql, $params, $param_list, true);


	if ($response['insertId'] == 0) {
	   $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'No se guardo el registro');
	}else{
		
		$sql = "INSERT INTO bitacora(accion, tipo_accion, fecha_procesamiento, id_usuario) VALUES (:accion, 1, NOW(), :id_usuario)";
                $param_bitacora = array("accion","id_usuario");
                $response_bitacora = $data->query($sql, $params, $param_bitacora, true);

		$response=array('success'=>true, 'titulo'=>'Operación exitosa!', 'mensaje'=>'Se creo el usuario');
	}
}
 
echo json_encode($response);
?>