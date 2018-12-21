<?php
class UsuarioDAO{
    public $idUsuario;
    public $Username;
    public $Password;

    //Constructor
    function __construct(){
        $this->idUsuario=0;
        $this->Username="";
        $this->Password="";
    }

    //getters y setters
    function getidUsuario(){
        return $this->idUsuario;
    }
    function setidUsuario($idU){
        $this->idUsuario = $idU;
    }
    //getters y setters
    function getUsername(){
        return $this->Username;
    }
    function setUsername($User){
        $this->Username = $User;
    }
    //getters y setters
    function getPassword(){
        return $this->Password;
    }
    function setPassword($Pass){
        $this->Password = $Pass;
    }
}
?>