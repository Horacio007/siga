<?php

    class orden_mecanica{
        
        private $id;
        private $id_vehiculo;
        private $fecha;
        private $diagnostico;
        private $elaboro;

        public function __construct($id = NULL, $id_vehiculo = NULL, $fecha = NULL, $diagnostico = NULL, $elaboro = NULL){
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->fecha = $fecha;
            $this->diagnostico = $diagnostico;
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

        public function getDiagnostico(){
            return $this->diagnostico;
        }

        public function setDiagnostico($diagnostico){
            $this->diagnostico = $diagnostico;
        }

        public function getElaboro(){
            return $this->elaboro;
        }

        public function setElaboro($elaboro){
            $this->elaboro = $elaboro;
        }
    }

?>