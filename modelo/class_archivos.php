<?php
    class archivos{

        private $id;
        private $id_vehiculo;
        private $ruta;

        public function __construct($id = NULL, $id_vehiculo = NULL, $ruta = NULL){
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->ruta = $ruta;
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

        public function getRuta(){
            return $this->ruta;
        }

        public function setRuta($ruta){
            $this->ruta = $ruta;
        }
    }

?>