<?php
class UsuarioRol{
    public $idUsuario;
    public $idRol;
    //Constructor
    function __construct(){
        $this->$idUsuario = "";
        $this->$idRol = "";
    }

    //getters y setters
    function getidUsuario(){
        return $this->$idUsuario;
    }
    function setidUsuario($idU){
        $this->$idUsuario = $idU;
    }

    //getters y setters
    function getidRol(){
        return $this->$idRol;
    }
    function setidRol($idR){
        $this->$idRol = $idR;
    }
}
?>