<?php
include_once 'Config.php';
class MySQLConexion
{
    var $conn;
    function getConexion()
    {
        $conn = mysqli_connect(MySQLConfig::gethost(), MySQLConfig::getusername(), MySQLConfig::getpassword(), MySQLConfig::getdatabase());
// checar conexion
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->$conn;    
    }

    function closeConexion()
    {
        mysqli_close($conn);
    }
}
?>