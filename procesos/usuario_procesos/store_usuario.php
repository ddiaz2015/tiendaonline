<?php

@session_start();
include("../../sql/class.managerDB.php");
include("../../sql/class.data.php");
$data = new data();
$array = array();

$sql = "SELECT id_empleado, CONCAT(nombre,' ', apellido) AS nombre_completo FROM empleado ORDER BY nombre_completo ASC";
$response = $data->query($sql);

echo json_encode($response);
?>