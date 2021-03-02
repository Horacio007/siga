<?php

    class tipo_servicio {

        private $id;
        private $tipo_servicio;

        public function __construct($id = NULL, $tipo_servicio = NULL){
            $this->id = $id;
            $this->tipo_servicio = $tipo_servicio;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTipo_servicio() {
            return $this->tipo_servicio;
        }

        public function setTipo_servicio($tipo_servicio) {
            $this->tipo_servicio = $tipo_servicio;
        }
    }

?>