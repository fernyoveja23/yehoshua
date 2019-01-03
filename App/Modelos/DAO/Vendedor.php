<?php
class Vendedor{
    public $IdVendedor;
    public $NombreVendedor;
    public $DireccionVendedor;
    public $EmailVendedor;
    public $TelefonoVendedor;
    public $idUsuario;

    //Constructor
    function __construct(){
        $this->IdVendedor=0;
        $this->NombreVendedor="";
        $this->DireccionVendedor="";
        $this->EmailVendedor="";
        $this->TelefonoVendedor="";
        $this->Usuario = 0;
    }

    //getters y setters
    function getIdVendedor(){
        return $this->IdVendedor;
    }
    function setIdVendedor($IdV){
        $this->IdVendedor = $IdV;
    }

    //getters y setters
    function getNombreVendedor(){
        return $this->NombreVendedor;
    }
    function setNombreVendedor($Nombre){
        $this->NombreVendedor = $Nombre;
    }

    //getters y setters
    function getDireccionVendedor(){
        return $this->DireccionVendedor;
    }
    function setDireccionVendedor($Direccion){
        $this->DireccionVendedor = $Direccion;
    }

    //getters y setters
    function getEmailVendedor(){
        return $this->EmailVendedor;
    }
    function setEmailVendedor($Email){
        $this->EmailVendedor = $Email;
    }

    //getters y setters
    function getTelefonoVendedor(){
        return $this->TelefonoVendedor;
    }
    function setTelefonoVendedor($Telefono){
        $this->TelefonoVendedor = $Telefono;
    }

    //getters y setters
    function getIdUsuario(){
        return $this->idUsuario;
    }
    function setIdUsuario($User){
        $this->idUsuario = $User;
    }

}
?>