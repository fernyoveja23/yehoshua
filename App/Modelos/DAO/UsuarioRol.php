<?php
class UsuarioRol{
    var $idUsuario;
    var $idRol;
    //Constructor
    function UsuarioRol(){
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