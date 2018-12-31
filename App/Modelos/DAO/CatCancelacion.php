<?php
class CatalogoCancelacion{
    public $idCatCancelacion;
    public $descripcionCatCancelacion;

    function __construct(){
        $idCatCancelacion = 0;
        $descripcionCatCancelacion = "";
    }

    //getters y setters
    function getidCatCancelacion(){
        return $this->$idCatCancelacion;
    }
    function setidCatCancelacion($idCC){
        $this->$idCatCancelacion = $idCC;
    }

    //getters y setters
    function getDescripcionCatCancelacion(){
        return $this->$descripcionCatCancelacion;
    }
    function setDescripcionCatCancelacion($descripCC){
        $this->$descripcionCatCancelacion = $descripCC;
    }
}
?>