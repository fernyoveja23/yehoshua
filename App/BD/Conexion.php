<?php
include_once 'Config.php';
class MySQLConexion
{
    function getConexion()
    {
        $conn = mysqli_connect(MySQLConfig::gethost(), MySQLConfig::getusername(), MySQLConfig::getpassword(), MySQLConfig::getdatabase());
// checar conexion
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
        mysqli_close($conn);
        echo "Connection closed";
    }
}
?>