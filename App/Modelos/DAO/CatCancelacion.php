<?php
class CatalogoCancelacion{
    var $idCatCancelacion;
    var $descripcionCatCancelacion;

    function CatalogoCancelacion{
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