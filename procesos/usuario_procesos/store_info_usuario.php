<?php
include("../../sql/class.data.php");
$data = new data();

$sql = "SELECT * FROM usuario";
$response = $data->query($sql);
if($response['total']>0){
	foreach($response['items'] as $index){
		
		}

	}

echo json_encode($response);
?>