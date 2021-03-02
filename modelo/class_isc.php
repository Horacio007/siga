<?php

    class isc {

        private $id;
        private $id_vehiculo;
        private $id_cliente;
        private $atendio;
        private $fecha;
        private $p1;
        private $p2;
        private $p3;
        private $p4;
        private $p5;
        private $p6;
        private $p7;
        private $total;

        public function __construct($id = NULL, $id_vehiculo = NULL, $id_cliente = NULL, $atendio = NULL, $fecha = NULL, $p1 = NULL, $p2 = NULL, $p3 = NULL, $p4 = NULL, $p5 = NULL, $p6 = NULL, $p7 = NULL, $total = NULL) {
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->$id_cliente = $id_cliente;
            $this->$atendio = $atendio;
            $this->fecha = $fecha;
            $this->p1 = $p1;
            $this->p2 = $p2;
            $this->p3 = $p3;
            $this->p4 = $p4;
            $this->p5 = $p5;
            $this->p6 = $p6;
            $this->p7 = $p7;
            $this->total = $total;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function get_idVehiculo() {
            return $this->id_vehiculo;
        }

        public function set_idVehiculo($id_vehiculo) {
            $this->id_vehiculo = $id_vehiculo;
        }

        public function get_idCliente() {
            return $this->id_cliente;
        }

        public function set_idCliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }

        public function get_atendio() {
            return $this->atendio;
        }

        public function set_atendio($atendio) {
            $this->atendio = $atendio;
        }

        public function get_fecha() {
            return $this->fecha;
        }

        public function set_fecha($fecha) {
            $this->fecha = $fecha;
        }

        public function get_p1() {
            return $this->p1;
        }

        public function set_p1($p1) {
            $this->p1 = $p1;
        }

        public function get_p2() {
            return $this->p2;
        }

        public function set_p2($p2) {
            $this->p2 = $p2;
        }

        public function get_p3() {
            return $this->p3;
        }

        public function set_p3($p3) {
            $this->p3 = $p3;
        }

        public function get_p4() {
            return $this->p4;
        }

        public function set_p4($p4) {
            $this->p4 = $p4;
        }

        public function get_p5() {
            return $this->p5;
        }

        public function set_p5($p5) {
            $this->p5 = $p5;
        }

        public function get_p6() {
            return $this->p6;
        }

        public function set_p6($p6) {
            $this->p6 = $p6;
        }

        public function get_p7() {
            return $this->p7;
        }

        public function set_p7($p7) {
            $this->p7 = $p7;
        }

        public function get_total() {
            return $this->total;
        }

        public function set_total($total) {
            $this->total = $total;
        }
    }

?>