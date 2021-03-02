<?php

    class gastos {

        private $id;
        private $fecha;
        private $articulos;
        private $gastos;
        private $forma_pago;
        private $factura;
        private $tipo;
        private $proveedor;
        private $expediente;
        private $estatus;

        public function __construct($id = NULL, $fecha = NULL, $articulos = NULL, $gastos = NULL, $forma_pago = NULL, $factura = NULL, $tipo = NULL, $proveedor = NULL, $expediente = NULL, $estatus = NULL) {
            $this->id = $id;
            $this->fecha = $fecha;
            $this->articulos = $articulos;
            $this->gastos = $gastos;
            $this->forma_pago = $forma_pago;
            $this->factura = $factura;
            $this->tipo = $tipo;
            $this->proveedor = $proveedor;
            $this->expediente = $expediente;
            $this->estatus = $estatus;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function getArticulos() {
            return $this->articulos;
        }

        public function setArticulos($articulos) {
            $this->articulos = $articulos;
        }

        public function getGastos() {
            return $this->gastos;
        }

        public function setGastos($gastos) {
            $this->gastos = $gastos;
        }

        public function getForma_pago() {
            return $this->forma_pago;
        }

        public function setForma_pago($forma_pago) {
            $this->forma_pago = $forma_pago;
        }

        public function getFactura() {
            return $this->factura;
        }

        public function setFactura($factura) {
            $this->factura = $factura;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getProveedor() {
            return $this->proveedor;
        }

        public function setProveedor($proveedor) {
            $this->proveedor = $proveedor;
        }

        public function getExpediente() {
            return $this->expediente;
        }

        public function setExpediente($expediente) {
            $this->expediente = $expediente;
        }

        public function getEstatus() {
            return $this->estatus;
        }

        public function setEstatus($estatus) {
            $this->estatus = $estatus;
        }
    }

?>