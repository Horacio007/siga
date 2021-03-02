<?php

class areas{

    private $id;
    private $nombre;

    public function __construct($id=NULL, $nombre=NULL){
        $this->id = $id;
        $this->nombre = $nombre;
        
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

}
?>