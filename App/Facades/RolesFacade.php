<?php
class RolesFacade
{
    //solo hara los selects que se le manden
    public function select($conn, $sql)
    {
        $result = $conn->query($sql);
        return $result;
    }

    /**
     * funcion abstracta que inserta algo en la base de datos.
     * ese algo llega en el parametro $sql.
     */
    public function insert($conn, $sql)
    {
        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id;
            return $last_id;
        } else {
            return 0;
        }
    }

    /**
     * Devuelve el resultado de buscar un rol por medio del nombre del rol.
     */
    public function getRolByName($conn, $rol)
    {
        $sql = "SELECT * FROM roles WHERE Rol = '" . $rol . "'";
        $result = $conn->query($sql);
        //Para checar si existe un error, cual es.
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        return $result;
    }

    /**
     * Funcion para obtener el id del rol que tiene el usuario que inicio sesion
     * por medio de su id, este es buscado en la tabla de usuariorol.
     */
    public function getIdRolByIdUser($conn, $idUser)
    {
        $sql = "SELECT IdRol FROM usuariorol WHERE idUsuario ='" . $idUser . "'";
        $result = $conn->query($sql);
        //Para checar si existe un error, cual es.
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        return $result;
    }

    /**
     * Funcion para obtener la descripcion del Rol a partir del id del rol
     */
    public function getRolById($conn, $idRol)
    {
        $sql = "SELECT * FROM roles WHERE idroles = '" . $idRol . "'";
        $result = $conn->query($sql);
        //Para checar si existe un error, cual es.
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        return $result;
    }
}
?>