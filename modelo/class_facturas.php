<?php

    class facturas {

        private $id;
        private $id_vehiculo;
        private $marca;
        private $linea;
        private $color;
        private $modelo;
        private $placas;
        private $cliente;
        private $cantidad;
        private $fecha_facturacion;
        private $estatus;
        private $fecha_bbva;
        private $comentarios;

        public function __construct($id = NULL, $id_vehiculo = NULL, $marca = NULL, $linea = NULL, $color = NULL, $modelo = NULL, $placas = NULL, $cliente = NULL, $cantidad = NULL, $fecha_facturacion = NULL, $estatus = NULL, $fecha_bbva = NULL, $comentarios = NULL) {
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->marca = $marca;
            $this->linea = $linea;
            $this->color = $color;
            $this->modelo = $modelo;
            $this->placas = $placas;
            $this->cliente = $cliente;
            $this->cantidad = $cantidad;
            $this->fecha_facturacion = $fecha_facturacion;
            $this->estatus = $estatus;
            $this->fecha_bbva = $fecha_bbva;
            $this->comentarios = $comentarios;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getIdVehiculo() {
            return $this->id_vehiculo;
        }

        public function setIdVehiculo($id_vehiculo) {
            $this->id_vehiculo = $id_vehiculo;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function getLinea(){
            return $this->linea;
        }

        public function setLinea($linea){
            $this->linea = $linea;
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($color){
            $this->color = $color;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function getPlacas(){
            return $this->placas;
        }

        public function setPlacas($placas){
            $this->placas = $placas;
        }

        public function getCliente(){
            return $this->cliente;
        }

        public function setCliente($cliente){
            $this->cliente = $cliente;
        }

        public function getCantidad() {
            return $this->cantidad;
        }

        public function setCantidad($cantidad) {
            $this->cantidad = $cantidad;
        }

        public function getFechaF() {
            return $this->fecha_facturacion;
        }

        public function setFechaF($fecha_facturacion) {
            $this->fecha_facturacion = $fecha_facturacion;
        }

        public function getEstatus() {
            return $this->estatus;
        }

        public function setEstatus($estatus) {
            $this->estatus = $estatus;
        }

        public function getFechaBBVA() {
            return $this->fecha_bbva;
        }

        public function setFechaBBVA($fecha_bbva) {
            $this->fecha_bbva = $fecha_bbva;
        }

        public function getComentarios() {
            return $this->comentarios;
        }

        public function setComentarios($comentarios) {
            $this->comentarios = $comentarios;
        }
    }

?>