<?php

@session_start();
$conf=array();
$data = new data();
define('MODULO_DEFECTO', 'login');
define('LAYOUT_DEFECTO', 'login.php');
define('LAYOUT_REPORTES', 'reportes.php');
define('LAYOUT_DESKTOP', 'desktop.php');
define('MODULO_PATH', realpath('modulos'));
define('MODULO_PATH_REPORT', realpath('reportes'));
define('LAYOUT_PATH', realpath('plantillas'));

if (isset($_SESSION['tienda'])) {
   if ($_SESSION['id_rol']==1){
        include("modulos/permisos/administrador.php");
    }else if($_SESSION['id_rol']==2){
        include("modulos/permisos/supervisor.php");
    }else if($_SESSION['id_rol']==3){
        include("modulos/permisos/digitador.php");
    }else if($_SESSION['id_rol']==4){
        include("modulos/permisos/consulta.php");
    }

} else {
    $conf['login'] = array(
        'archivo' => 'login.php',
        'layout' => LAYOUT_DEFECTO
    );

}
?>