<?php
include_once ("class.connDB.php");

#Esta clase nos permitira conectarnos a la base de datos
class managerDB {
    
    #Constructor
    function managerDB() {       
    }

    function conectar() {
        $conectar = new connDB();
        try {
            if ($tipo = "mysql") {
                $connection = new PDO("mysql:host=$conectar->Server_MySQL;dbname=$conectar->DB_MySQL;charset=UTF8", "$conectar->User_MySQL", "$conectar->Password_MySQL");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return($connection);
    }
}
?>