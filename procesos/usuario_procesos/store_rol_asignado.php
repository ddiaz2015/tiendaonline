<?php
@session_start();
include("../../sql/class.managerDB.php");
include("../../sql/class.data.php");
$data = new data();
$array = array();
$params = $_POST;

		    $sql = "SELECT r.id_rol, r.rol FROM rol r INNER JOIN usuario u ON r.id_rol=u.id_rol WHERE u.id_usuario =:id_usuario";
		    $response_asignados = $data->query($sql, array("id_usuario" => $params["id_usuario"])); 

		     $selected = ( $response_asignados["total"] > 0 ) ? "selected" : "";
        array_push($array, array("id_rol" => $response_asignados['id_rol'], "rol" => $response_asignados['rol'], "selected" => $selected));

 
//print_r($response_asignados);
echo json_encode($response_asignados);
?>