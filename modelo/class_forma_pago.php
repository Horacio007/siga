<?php

    class forma_pago {

        private $id;
        private $forma_pago;

        public function __construct($id = NULL, $forma_pago = NULL) {
            $this->id = $id;
            $this->forma_pago = $forma_pago;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getForma_pago() {
            return $this->forma_pago;
        }

        public function setForma_pago($forma_pago) {
            $this->forma_pago = $forma_pago;
        }
    }

?>