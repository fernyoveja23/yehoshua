<?php
class Usuario{
    var $idUsuario;
    var $Username;
    var $Password;

    //Constructor
    function Usuario(){
        $this->$idUsuario=0;
        $this->$Username="";
        $this->$Password="";
    }

    //getters y setters
    function getidUsuario(){
        return $this->$idUsuario;
    }
    function setidUsuario($idU){
        $this->$idUsuario = $idU;
    }
    //getters y setters
    function getUsername(){
        return $this->$Username;
    }
    function setUsername($User){
        $this->$Username = $User;
    }
    //getters y setters
    function getPassword(){
        return $this->$Password;
    }
    function set($Pass){
        $this->$Password = $Pass;
    }
}
?>