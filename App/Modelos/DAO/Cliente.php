<?php
class Cliente{
    public $idCliente;
    public $nombreCliente;
    public $apellidoPCliente;
    public $apellidoMCliente;
    public $emailCliente;
    public $celularCliente;

    function __construct(){
        $idCliente = 0;
        $nombreCliente = "";
        $apellidoPCliente = "";
        $apellidoMCliente = "";
        $emailCliente = "";
        $celularCliente = "";
    }

    //getters y setters
    function getIdCliente(){
        return $this->$idCliente;
    }
    function setIdCliente($idC){
        $this->$idCliente = $idC;
    }

    //getters y setters
    function getNombreCliente(){
        return $this->$nombreCliente;
    }
    function setNombreCliente($nombreC){
        $this->$nombreCliente = $nombreC;
    }

    //getters y setters
    function getApellidoPCliente(){
        return $this->$apellidoPCliente;
    }
    function setApellidoPCliente($apellidoPC){
        $this->$apellidoPCliente = $apellidoPC;
    }

    //getters y setters
    function getApellidoMCliente(){
        return $this->$apellidoMCliente;
    }
    function setApellidoPCliente($apellidoMC){
        $this->$apellidoMCliente = $apellidoMC;
    }

    //getters y setters
    function getEmailCliente(){
        return $this->$emailCliente;
    }
    function setEmailCliente($emailC){
        $this->$emailCliente = $emailC;
    }

    //getters y setters
    function getCelularCliente(){
        return $this->$celularCliente;
    }
    function setCelularCliente($celularC){
        $this->$celularCliente = $celularC;
    }

}
?>