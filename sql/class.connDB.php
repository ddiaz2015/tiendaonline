<?php
class connDB {

    var $DB_MySQL;
    var $Server_MySQL;
    var $User_MySQL;
    var $Password_MySQL;

    function connDB() {
        $this->DB_MySQL = "tienda";
        $this->Server_MySQL = "localhost";
        $this->User_MySQL = "root";
        $this->Password_MySQL = "admin";
    }
}
?>