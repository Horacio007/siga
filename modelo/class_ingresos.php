<?php

    class ingresos {

        private $id;
        private $expediente;
        private $marca;
        private $linea;
        private $color;
        private $modelo;
        private $placas;
        private $cliente;
        private $tipo_servicio;
        private $fecha_anticipo;
        private $anticipo;
        private $tipo_pago_anticipo;
        private $fecha_finiquito;
        private $finiquito;
        private $tipo_pago_finiquito;
        private $total;

        public function __construct($id = NULL, $expediente = NULL, $marca = NULL, $linea = NULL, $color = NULL, $modelo = NULL, $placas = NULL, $cliente = NULL, $tipo_servicio = NULL, $fecha_anticipo = NULL, $anticipo = NULL, $tipo_pago_anticipo = NULL, $fecha_finiquito = NULL, $finiquito = NULL, $tipo_pago_finiquito = NULL, $total = NULL) {
            $this->id = $id;
            $this->expediente = $expediente;
            $this->marca = $marca;
            $this->linea = $linea;
            $this->color = $color;
            $this->modelo = $modelo;
            $this->placas = $placas;
            $this->cliente = $cliente;
            $this->tipo_servicio = $tipo_servicio;
            $this->fecha_anticipo = $fecha_anticipo;
            $this->anticipo = $anticipo;
            $this->tipo_pago_anticipo = $tipo_pago_anticipo;
            $this->fecha_finiquito = $fecha_finiquito;
            $this->finiquito = $finiquito;
            $this->tipo_pago_finiquito = $tipo_pago_finiquito;
            $this->total = $total;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getExpediente() {
            return $this->fecha;
        }

        public function setExpediente($expediente) {
            $this->expediente = $expediente;
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

        public function getTipo_servicio() {
            return $this->tipo_servicio;
        }

        public function setTipo_servicio($tipo_servicio) {
            $this->tipo_servicio = $tipo_servicio;
        }

        public function getFecha_anticipo() {
            return $this->fecha_anticipo;
        }

        public function setFecha_anticipo($fecha_anticipo) {
            $this->fecha_anticipo = $fecha_anticipo;
        }

        public function getAnticipo() {
            return $this->anticipo;
        }

        public function setAnticipo($anticipo) {
            $this->anticipo = $anticipo;
        }

        public function getTipo_pago_anticipo() {
            return $this->tipo_pago_anticipo;
        }

        public function setTipo_pago_anticipo($tipo_pago_anticipo) {
            $this->tipo_pago_anticipo = $tipo_pago_anticipo;
        }

        public function getFecha_finiquito() {
            return $this->fecha_finiquito;
        }

        public function setFecha_finiquito($fecha_finiquito) {
            $this->fecha_finiquito = $fecha_finiquito;
        }

        public function getFiniquito() {
            return $this->finiquito;
        }

        public function setFiniquito($finiquito) {
            $this->finiquito = $finiquito;
        }

        public function getTipo_pago_finiquito() {
            return $this->tipo_pago_finiquito;
        }

        public function setTipo_pago_finiquito($tipo_pago_finiquito) {
            $this->tipo_pago_finiquito = $tipo_pago_finiquito;
        }

        public function getTotal() {
            return $this->total;
        }

        public function setTotal($total) {
            $this->total = $total;
        }


    }

?>