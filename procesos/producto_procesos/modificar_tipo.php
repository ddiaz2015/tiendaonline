<?php
@session_start();
include("../../sql/class.data.php");

$params=$_POST;
$data= new data();
$params["id_usuario"] = $_SESSION['id_usuario'];
$params["accion"] = 'Se modifico tipo';

$sql="SELECT tipo FROM tipo_producto WHERE tipo=:txtTipo";
 $parametros = array("txtTipo");
    $result = $data->query($sql, $params, $parametros, true); 

    if($result['total'] > 0){
    	$response = array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Esta marca ya existe');

    }else{

    $sql = "UPDATE tipo_producto SET tipo=:txtTipo, fecha_modificacion=NOW() WHERE id_tipo_producto=:txtId";
    $param_list = array("txtTipo", "txtId");
    $response = $data->query($sql, $params, $param_list, true);  

		if ($response['total'] > 0) {
			$sql = "INSERT INTO bitacora(accion, tipo_accion, fecha_procesamiento, id_usuario) VALUES (:accion, 2, NOW(), :id_usuario)";
		                $param_bitacora = array("accion","id_usuario");
		                $response_bitacora = $data->query($sql, $params, $param_bitacora, true);
		    $response = array("success"=>true, 'titulo'=>'Operacion exitosa!', 'mensaje'=>'Se modifico tipo');
		} else {
		    $response = array('success'=>false, 'titulo'=>'Verifique su informacion!', 'mensaje'=>'No se modifico el usuario');
		}
}

echo json_encode($response);
?>