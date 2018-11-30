<?php
class EventoTuristico
{
    var $idEvento;
    var $NombreEvento;
    var $FechaIniEvento;
    var $FechaFinEvento;
    var $CapacidadEvento;
    var $DescripcionEvento;
    var $CostoEvento;


    //Constructor Evento
    function EventoTuristico()
    {
        $idEvento = 0;
        $NombreEvento = "";
        $FechaIniEvento = new DateTime(null);
        $FechaFinEvento = new DateTime(null);
        $CapacidadEvento = 0;
        $DescripcionEvento = "";
        $CostoEvento = 1.01;
    }

    //Getters y Setters de idEvento
    function getIdEvento()
    {
        return $this->$idEvento;
    }
    function setIdEvento($idE)
    {
        $this->$idEvento = $idE;
    }

    //Getters y Setters de NombreEvento
    function getNombreEvento()
    {
        return $this->$NombreEvento;
    }
    function setNombreEvento($Nombre)
    {
        $this->$NombreEvento = $Nombre;
    }

    //Getters y Setters de FechaIniEvento
    function getFechaIniEvento()
    {
        return $this->$FechaIniEvento;
    }
    function setFechaIniEvento($FechaIni)
    {
        $this->$FechaIniEvento = $FechaIni;
    }

    //Getters y Setters de FechaFinEvento
    function getFechaFinEvento()
    {
        return $this->$FechaFinEvento;
    }
    function setFechaFinEvento($FechaFin)
    {
        $this->$FechaFinEvento = $FechaFin;
    }

    //Getters y Setters de 
    function getCapacidadEvento()
    {
        return $this->$CapacidadEvento;
    }
    function setCapacidadEvento($Capacidad)
    {
        $this->$CapacidadEvento = $Capacidad;
    }

    //Getters y Setters de 
    function getDescripcionEvento()
    {
        return $this->$DescripcionEvento;
    }
    function setDescripcionEvento($Descripcion)
    {
        $this->$DescripcionEvento=$Descripcion;
    }

    //Getters y Setters de 
    function getCostoEvento()
    {
        return $this->$CostoEvento;
    }
    function setCostoEvento($Costo)
    {
        $this->$CostoEvento=$Costo;
    }

}
?>