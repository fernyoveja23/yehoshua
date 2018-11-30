<?php
require_once'EventoTuristico.php';
class Lugar{
    var $id_Lugar;
    var $EventoTuristico;
    var $Detalle_Lugar;

    //Constructor del lugar
    function Lugar(){
        $id_Lugar = 0;
        $EventoTuristico = new EventoTuristico;
        $Detalle_Lugar = "";
    }

    //getters y setters del lugar
    function getIdLuga(){
        return $this->$id_Lugar;
    }
    function setIdLugar($idL){
        $this->$id_Lugar = $idL;
    }

    //getters y setters del evento
    function getEventoTuristico(){
        return $this->EventoTuristico;
    }
    function setEventoTuristico($Evento){
        $this->$EventoTuristico = $Evento;
    }

    //getters y setters del detalle del lugar
    function getDetalleLugar(){
        return $this->Detalle_Lugar;
    }
    function setDetalleLugar($Detalles){
        $this->Detalle_Lugar = $Detalles;
    }

}

?>