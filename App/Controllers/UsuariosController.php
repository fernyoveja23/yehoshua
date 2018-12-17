<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/yehoshua/App/Facades/UsuarioFacade.php';
class UsuarioController{
    public $conn;
    public $usuarioFacade;

    //constructor
    public function __construct($conne){
        $this->conn = $conne;
        $this->usuarioFacade = new UsuarioFacade();
    }

    //comprueba si existe algun administrador
    //devuelve 1 si ya hay por lo menos algun administrador
    //devuelve 0 si no existe ninguno
    public function getAdmin(){
        $sql = "SELECT * FROM usuariorol WHERE IdRol = 'ADM'";
        $result = $this->usuarioFacade->select($this->conn, $sql);
        if($result->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    //Guarda el usuario y su password ademas de asignarle el rol de Administrador
    public function saveAdmin($username, $password){
        $sql = "INSERT INTO `usuarios` (`Username`, `Password`) VALUES ('".$username."', '".base64_encode($password)."')";
        
        $result = $this->usuarioFacade->insert($this->conn, $sql);
        if($result!=0){
            $sql = "INSERT INTO `usuariorol` (`idUsuario`, `IdRol`) VALUES ('".$result."', 'ADM')";
            if ($this->conn->query($sql) === TRUE) {
                $this->conn->commit();
            }else{
                $this->conn->rollback();
            }
        }
        return $result;
    }

    public function saveUser($username, $password, $rol){
        $sql = "INSERT INTO `usuarios` (`Username`, `Password`) VALUES ('".$username."', '".base64_encode($password)."')";
        
        $result = $this->usuarioFacade->insert($this->conn, $sql);
        if($result!=0){
            $sql = "INSERT INTO `usuariorol` (`idUsuario`, `IdRol`) VALUES ('".$result."', '".$rol."')";
            if ($this->conn->query($sql) === TRUE) {
                $this->conn->commit();
            }else{
                $this->conn->rollback();
            }
        }
        return $result;
    }
}
?>