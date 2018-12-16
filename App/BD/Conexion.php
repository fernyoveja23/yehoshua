<?php
include_once 'Config.php';
class MySQLConexion
{
    
    public function getConexion()
    {
        $conn = mysqli_connect(MySQLConfig::gethost(), MySQLConfig::getusername(), MySQLConfig::getpassword(), MySQLConfig::getdatabase());
// checar conexion
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->autocommit(FALSE);
        return $conn;    
    }

    public function closeConexion()
    {
        mysqli_close($conn);
    }
}
?>