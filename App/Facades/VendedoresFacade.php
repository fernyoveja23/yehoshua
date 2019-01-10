<?php
class VendedoresFacade
{
    //solo hara los selects que se le manden
    public function select($conn, $sql)
    {
        $result = $conn->query($sql);
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        return $result;
    }

    public function insert($conn, $sql)
    {
        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id;
            return $last_id;
        } else {
                trigger_error('Invalid query: ' . $conn->error);
            return 0;
        }
    }

    public function update($conn, $sql)
    {
        $conn->query($sql);
        if (mysqli_affected_rows($conn)==0) {
            trigger_error('Invalid query: ' . $conn->error);
            return 0;
        }else{
            return 1;
        }        
    }

    /**
     * Funcion para poder ver si los usuarios ya registraron sus datos
     */
    public function getVendedorById($conn, $userId)
    {
        $sql = "SELECT * FROM vendedor WHERE usuarios_idusuarios = '" . $userId . "'";
        $result = $conn->query($sql);
        //Para checar si existe un error, cual es.
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        return $result;
    }
}

?>