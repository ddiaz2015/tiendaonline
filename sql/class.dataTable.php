<?php

include_once ("class.managerDB.php");

class dataTable {

    //constructor
    function dataTable() {
        
    }

    function obtener_Usuarios() { 
        $managerDB = new managerDB(); 
        $connection = $managerDB->conectar("mysql"); 
        if ($connection!=null) {
            $response=array('success'=>true);
            $sql = "SELECT u.id_usuario, u.usuario, u.estado, CONCAT(e.nombre, ' ', e.apellido) AS nombre_completo FROM usuario u INNER JOIN empleado e ON u.id_empleado = e.id_empleado";
            try {
                $query=$connection->prepare($sql);
                $query->execute();
                $response['items']=$query->fetchAll(PDO::FETCH_ASSOC);
                $response['total']=$query->rowCount();
            } catch(PDOException $error) { 
                if ($transaction) $connection->rollback();
                $response= array('success'=>false, 'error'=>$error->getMessage());
            }
        } else {
            $response= array('success'=>false, 'error'=>'No está conectado al servidor de bases de datos.');
        }
        return $response;
        unset($connection);
        unset($query);
    }
    
     function obtener_marca() { 
        $managerDB = new managerDB(); 
        $connection = $managerDB->conectar("mysql"); 
        if ($connection!=null) {
            $response=array('success'=>true);
            $sql = "SELECT id_marca, marca, estado FROM marca";
            try {
                $query=$connection->prepare($sql);
                $query->execute();
                $response['items']=$query->fetchAll(PDO::FETCH_ASSOC);
                $response['total']=$query->rowCount();
            } catch(PDOException $error) { 
                if ($transaction) $connection->rollback();
                $response= array('success'=>false, 'error'=>$error->getMessage());
            }
        } else {
            $response= array('success'=>false, 'error'=>'No está conectado al servidor de bases de datos.');
        }
        return $response;
        unset($connection);
        unset($query);
    }

  }
?>