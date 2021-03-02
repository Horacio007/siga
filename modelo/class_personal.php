<?php

class personal{

    private $id;
    private $id_area;
    private $nombre;

    public function __construct($id=NULL, $id_area=NULL, $nombre=NULL){
        $this->id = $id;
        $this->id_area = $id_area;
        $this->nombre = $nombre;
        
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getIdArea(){
        return $this->id_area;
    }

    public function setIdArea($id_area){
        $this->id_area = $id_area;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

}

?>