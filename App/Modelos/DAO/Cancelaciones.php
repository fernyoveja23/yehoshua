<?php
include 'Venta.php';
include 'CatCancelacion.php';
class Cancelaciones{
    public $idCancelacion;
    public $fechaCancelacion;
    public $comisionCanelacion;
    public $venta;
    public $catCancelacion;

    function __construct(){
        $idCancelacion = 0;
        $fechaCancelacion = new DateTime(null);
        $comisionCanelacion = 0;
        $venta = new Venta;
        $catCancelacion = new CatalogoCancelacion;
    }

    //getters y setters
    function getIdCancelacion(){
        return $this->$idCancelacion;
    }
    function setIdCancelacion($idCan){
        $this->$idCancelacion = $idCan;
    }

    //getters y setters
    function getFechaCancelacion(){
        return $this->$fechaCancelacion;
    }
    function setFechaCancelacion($fecha){
        $this->$fechaCancelacion = $fecha;
    }

    //getters y setters
    function getComisionCanelacion(){
        return $this->$comisionCanelacion;
    }
    function setComisionCanelacion($comision){
        $this->$comisionCanelacion = $comision;
    }

    //getters y setters
    function getVenta(){
        return $this->$venta;
    }
    function setVenta($ven){
        $this->$venta = $ven;
    }

    //getters y setters
    function getCatCancelacion(){
        return $this->$catCancelacion;
    }
    function setCatCancelacion($catC){
        $this->$catCancelacion = $catC;
    }
}
?>