<?php

    class conceptos_pagos {

        private $id;
        private $concepto_pago;

        public function __construct($id = NULL, $concepto_pago = NULL) {
            $this->id = $id;
            $this->concepto_pago = $concepto_pago;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getConcepto_pago() {
            return $this->concepto_pago;
        }

        public function setConcept_pago($concepto_pago) {
            $this->concepto_pago = $concepto_pago;
        }
    }

?>