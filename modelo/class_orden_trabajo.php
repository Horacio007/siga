<?php

class orden_trabajo{
    
    private $id;
    private $id_vehiculo;
    private $fecha;
    private $reparacion;
    private $hojalateria;
    private $pintura;
    private $mecanica;
    private $observaciones;
    private $elavoro;

    public function __construct($id = NULL, $id_vehiculo = NULL, $fecha = NULL, $reparacion = NULL, $hojalateria = NULL, $pintura = NULL, $mecanica = NULL, $observaciones = NULL, $elavoro = NULL){
        $this->id = $id;
        $this->id_vehiculo = $id_vehiculo;
        $this->fecha = $fecha;
        $this->reparacion = $reparacion;
        $this->hojalateria = $hojalateria;
        $this->pintura = $pintura;
        $this->mecanica = $mecanica;
        $this->observaciones = $observaciones;
        $this->elavoro = $elavoro;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdVehiculo(){
        return $this->id_vehiculo;
    }

    public function setIdVehiculo($id_vehiculo){
        $this->id_vehiculo = $id_vehiculo;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getReparacion(){
        return $this->reparacion;
    }

    public function setReparacion($reparacion){
        $this->reparacion = $reparacion;
    }

    public function getHojalateria(){
        return $this->hojalateria;
    }

    public function setHojalateria($hojalateria){
        $this->hojalateria = $hojalateria;
    }

    public function getPintura(){
        return $this->pintura;
    }

    public function setPintura($pintura){
        $this->pintura = $pintura;
    }

    public function getMecanica(){
        return $this->mecanica;
    }

    public function setMecanica($mecanica){
        $this->mecanica = $mecanica;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }

    public function getElavoro(){
        return $this->elavoro;
    }

    public function setElavoro($elavoro){
        $this->elavoro = $elavoro;
    }
}

?>