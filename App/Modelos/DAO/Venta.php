<?php
include 'Evento.php';
include 'Cliente.php';
class Venta{
    var $idVenta;
    var $fechaVenta;
    var $noViajerosVenta;
    var $Total;
    var $Evento;
    var $Cliente;

    function Venta(){
        $idVenta = 0;
        $fechaVenta = new DateTime(null);
        $noViajerosVenta = 0;
        $Total = 0.00;
        $Evento = new EventoTuristico;
        $Cliente = new Cliente;
    }

    //getters y setters
    function getIdVenta(){
        return $this->$idVenta;
    }
    function setIdVenta($idV){
        $this->$idVenta = $idV;
    }

    //getters y setters
    function getFechaVenta(){
        return $this->$fechaVenta;
    }
    function setFechaVenta($fechaV){
        $this->$fechaVenta = $fechaV;
    }

    //getters y setters
    function getNoViajerosVenta(){
        return $this->$noViajerosVenta;
    }
    function setNoViajerosVenta($noViajeros){
        $this->$noViajerosVenta = $noViajeros;
    }

    //getters y setters
    function getTotal(){
        return $this->$Total;
    }
    function setTotal($Tot){
        $this->$Total = $Tot;
    }

    //getters y setters
    function getEvento(){
        return $this->$Evento;
    }
    function setEvento($Even){
        $this->$Evento = $Even;
    }

    //getters y setters
    function getCliente(){
        return $this->$Cliente;
    }
    function setCliente($Clien){
        $this->$Cliente = $Clien;
    }
}
?>