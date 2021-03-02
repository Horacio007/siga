<?php

    class tipo_pago {

        private $id;
        private $tipo_pago;

        public function __construct($id = NULL, $tipo_pago = NULL){
            $this->id = $id;
            $this->tipo_pago = $tipo_pago;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTipo_pago() {
            return $this->tipo_pago;
        }

        public function setTipo_pago($tipo_pago) {
            $this->tipo_pago = $tipo_pago;
        }
    }

?>