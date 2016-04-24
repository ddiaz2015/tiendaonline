<?php
@ob_start();
@session_start();
include("../sql/class.managerDB.php");
include("../sql/class.data.php");
$data = new data();
 
$params = $_POST;
$psw2 = 'vj2016';
$response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Llene correctamente los campos');

if ($params["txtusuario"] === "" || $params["txtusuario"] === null || trim($params["txtusuario"]) === "" || $params["txtpassword"] === "" || $params["txtpassword"] === null || trim($params["txtpassword"]) === "") {
    $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Llene correctamente los campos');          

} else {
    $sql="SELECT usuario.estado, usuario.usuario, usuario.id_usuario, usuario.id_rol, usuario.cargo FROM variedades_jaqueline.usuario WHERE usuario.usuario=:txtusuario AND usuario.contrasenia=md5(:txtpassword) AND usuario.estado='Activo'";
    $param_list = array("txtusuario", "txtpassword");
    $response = $data->query($sql, $params, $param_list);
    if ($response["total"] > 0) {
        if ($response["items"][0]["estado"] == "Activo") {
            $_SESSION["tienda"] = true;
            $_SESSION["login"] = true;
            $_SESSION["id_usuario"] = $response["items"][0]["id_usuario"];
            $_SESSION["id_rol"] = $response["items"][0]["id_rol"];
            $_SESSION["cargo"] = $response["items"][0]["cargo"];
            $_SESSION["usuario"] = $response["items"][0]["usuario"];
            $sql = "INSERT INTO bitacora(accion, tipo_accion, fecha_procesamiento, id_usuario) VALUES ('Inicio de sesion', 4, NOW(), :id_usuario)";
            $response_bitacora = $data->query($sql, array('id_usuario' => $_SESSION["id_usuario"]), array(), true); 
            if ($response_bitacora["insertId"] > 0) {
                if ($params["txtpassword"] === $psw2) { 
                    $response=array('success'=>true, 'modulo'=>'?mod=contrasena', 'titulo'=>'Bienvenido', 'mensaje'=> 'Usuario: '.$_SESSION["cargo"]);
                }else{ 
                    $response=array('success'=>true, 'modulo'=>'?mod=inicio', 'titulo'=>'Bienvenido', 'mensaje'=> 'Usuario: '.$_SESSION["cargo"]);
                }
            }
        } else {
            $response=array('success'=>false, 'titulo'=>'comunicarse con administrador de sistema!', 'mensaje'=>'Su usuario ha sido dado de baja');
        }
    } else {
        $response=array('success'=>false, 'titulo'=>'Verifique su información!', 'mensaje'=>'Usuario o contrase&ntilde;a invalidos');
    }
}

echo json_encode($response);
?>