<?php
include 'EventoTuristico.php';
include 'Usuarios.php';
class Vendedor{
    var $IdVendedor;
    var $NombreVendedor;
    var $DireccionVendedor;
    var $EmailVendedor;
    var $TelefonoVendedor;
    var $Usuario;

    //Constructor
    function Vendedor(){
        $this->$IdVendedor=0;
        $this->$NombreVendedor="";
        $this->$DireccionVendedor="";
        $this->$EmailVendedor="";
        $this->$TelefonoVendedor="";
        $this->$Usuario = new Usuario;
    }

    //getters y setters
    function getIdVendedor(){
        return $this->$IdVendedor;
    }
    function setIdVendedor($IdV){
        $this->$IdVendedor = $IdV;
    }

    //getters y setters
    function getNombreVendedor(){
        return $this->$NombreVendedor;
    }
    function setNombreVendedor($Nombre){
        $this->$NombreVendedor = $Nombre;
    }

    //getters y setters
    function getDireccionVendedor(){
        return $this->$DireccionVendedor;
    }
    function setDireccionVendedor($Direccion){
        $this->$DireccionVendedor = $Direccion;
    }

    //getters y setters
    function getEmailVendedor(){
        return $this->$EmailVendedor;
    }
    function setEmailVendedor($Email){
        $this->$EmailVendedor = $Email;
    }

    //getters y setters
    function getTelefonoVendedor(){
        return $this->$TelefonoVendedor;
    }
    function setTelefonoVendedor($Telefono){
        $this->$TelefonoVendedor = $Telefono;
    }

    //getters y setters
    function getUsuario(){
        return $this->$Usuario;
    }
    function setUsuario($User){
        $this->$Usuario = $User;
    }

}
?>