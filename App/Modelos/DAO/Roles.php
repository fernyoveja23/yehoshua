<?php
class Rol{
    var $idRol;
    var $Rol;
    var $DescripcionRol;

    //Constructor
    function Rol(){
        $this->$idRol = 0;
        $this->$Rol = "";
        $this->$DescripcionRol = "";
    }

    //getters y setters
    function getidRol(){
        return $this->$idRol;
    }
    function setidRol($idR){
        $this->$idRol = $idR;
    }
    //getters y setters
    function getRol(){
        return $this->$Rol;
    }
    function setRol($R){
        $this->$Rol = $R;
    }
    //getters y setters
    function getDescripcionRol(){
        return $this->$DescripcionRol;
    }
    function setDescripcionRol($Descripcion){
        $this->$DescripcionRol = $Descripcion;
    }
}
?>