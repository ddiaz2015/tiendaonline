<?php

date_default_timezone_set('America/El_Salvador'); 
setlocale(LC_TIME, 'spanish');

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

include('sql/class.data.php');
include('sql/class.dataTable.php');
//include('sql/class.managerDB.php');
include('conf.php');

$dataTable = new dataTable();
if (isset($_GET['mod'])) {
    $modulo = $_GET['mod'];
} else {
    $modulo = MODULO_DEFECTO;
}
if (isset($conf[$modulo]['layout'])) {
    $path_layout = LAYOUT_PATH . '/' . $conf[$modulo]['layout'];
    if (!empty($conf[$modulo]['layout'])) {
        include($path_layout);
    }
} else {
    if (isset($_SESSION['tienda'])) {
        $modulo = 'error';
        $path_layout = LAYOUT_PATH . '/' . $conf[$modulo]['layout'];
        include($path_layout);
    } else {
        $modulo = 'login';
        $path_layout = LAYOUT_PATH . '/' . $conf[$modulo]['layout'];
        include($path_layout);
    }
}
?>