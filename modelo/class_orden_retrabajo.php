<?php

    class orden_retrabajo{
        
        private $id;
        private $id_vehiculo;
        private $fecha;
        private $observaciones;
        private $elaboro;

        public function __construct($id = NULL, $id_vehiculo = NULL, $fecha = NULL, $observaciones = NULL, $elaboro = NULL){
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->fecha = $fecha;
            $this->observaciones = $observaciones;
            $this->elaboro = $elaboro;
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

        public function getObservaciones(){
            return $this->observaciones;
        }

        public function setObservaciones($observaciones){
            $this->observaciones = $observaciones;
        }

        public function getElaboro(){
            return $this->elaboro;
        }

        public function setElaboro($elaboro){
            $this->elaboro = $elaboro;
        }
    }

?>