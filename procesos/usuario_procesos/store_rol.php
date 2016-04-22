<?php

@session_start();
include("../../sql/class.managerDB.php");
include("../../sql/class.data.php");
$data = new data();
$array = array();

$sql = "SELECT id_rol, rol FROM rol ORDER BY rol ASC";
$response = $data->query($sql);

echo json_encode($response);
?>