<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Facades/RolesFacade.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/App/Modelos/DAO/Roles.php';

class RolesController
{
    public $conn;
    public $rolesFacade;
    public $currentRol;

    //constructor
    public function __construct($conne)
    {
        $this->conn = $conne;
        $this->rolesFacade = new RolesFacade();
        $this->currentRol = new Rol();
    }

    public function getIdRol($rol)
    {
        $result = $this->rolesFacade->getRolByName($this->conn, $rol);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            return $row["idroles"];
        } else {
            return "";
        }

    }

    public function getRolByIdUsusario($usuario)
    {
        $result = $this->rolesFacade->getIdRolByIdUser($this->conn, $usuario);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $resultRol = $this->rolesFacade->getRolById($this->conn, $row["IdRol"]);
            if ($resultRol->num_rows == 1) {
                $row = $resultRol->fetch_assoc();
                return $row["Rol"];
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

}


?>