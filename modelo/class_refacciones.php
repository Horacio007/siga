<?php

    class refacciones{
        
        private $id;
        private $id_vehiculo;
        private $concepto;
        private $cantidad;
        private $nombreprov1;
        private $nombreprov2;
        private $nombreprov3;
        private $proveedor1;
        private $proveedor2;
        private $proveedor3;
        private $tproveedor1;
        private $tproveedor2;
        private $tproveedor3;
        private $proveedorfinal;
        private $costo;
        private $costofinal;
        private $fecha_promesa;
        private $num_guia;
        private $fecha_llegada;
        private $comentarios;
        private $fecha;

        public function __construct($id = NULL, $id_vehiculo = NULL, $concepto = NULL, $cantidad = NULL, $nombreprov1 = NULL, $nombreprov2 = NULL, $nombreprov3 = NULL, $proveedor1 = NULL, $proveedor2 = NULL, $proveedor3 = NULL, $tproveedor1 = NULL, $tproveedor2 = NULL, $tproveedor3 = NULL, $proveedorfinal = NULL, $costo = NULL, $costofinal = NULL, $fecha_promesa = NULL, $num_guia = NULL, $fecha_llegada = NULL, $comentarios = NULL, $fecha = NULL){
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->concepto = $concepto;
            $this->cantidad = $cantidad;
            $this->nombreprov1 = $nombreprov1;
            $this->nombreprov2 = $nombreprov2;
            $this->nombreprov3 = $nombreprov3;
            $this->proveedor1 = $proveedor1;
            $this->proveedor2 = $proveedor2;
            $this->proveedor3 = $proveedor3;
            $this->tproveedor1 = $tproveedor1;
            $this->tproveedor2 = $tproveedor2;
            $this->tproveedor3 = $tproveedor3;
            $this->proveedorfinal = $proveedorfinal;
            $this->costo = $costo;
            $this->costofinal = $costofinal;
            $this->fecha_promesa = $fecha_promesa;
            $this->num_guia = $num_guia;
            $this->fecha_llegada = $fecha_llegada;
            $this->comentarios = $comentarios;
            $this->fecha = $fecha;
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

        public function getConcepto(){
            return $this->concepto;
        }

        public function setConcepto($concepto){
            $this->concepto = $concepto;
        }

        public function getCantidad(){
            return $this->cantidad;
        }

        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }

        public function getNombreprov1(){
            return $this->nombreprov1;
        }

        public function setNombreprov1($nombreprov1){
            $this->nombreprov1 = $nombreprov1;
        }

        public function getNombreprov2(){
            return $this->nombreprov2;
        }

        public function setNombreprov2($nombreprov2){
            $this->nombreprov2 = $nombreprov2;
        }

        public function getNombreprov3(){
            return $this->nombreprov3;
        }

        public function setNombreprov3($nombreprov3){
            $this->nombreprov3 = $nombreprov3;
        }

        public function getProveedor1(){
            return $this->proveedor1;
        }

        public function setProveedor1($proveedor1){
            $this->proveedor1 = $proveedor1;
        }

        public function getProveedor2(){
            return $this->proveedor2;
        }

        public function setProveedor2($proveedor2){
            $this->proveedor2 = $proveedor2;
        }

        public function getProveedor3(){
            return $this->proveedor3;
        }

        public function setProveedor3($proveedor3){
            $this->proveedor3 = $proveedor3;
        }

        public function getTProveedor1(){
            return $this->tproveedor1;
        }

        public function setTProveedor1($tproveedor1){
            $this->tproveedor1 = $tproveedor1;
        }

        public function getTProveedor2(){
            return $this->tproveedor2;
        }

        public function setTProveedor2($tproveedor2){
            $this->tproveedor2 = $tproveedor2;
        }

        public function getTProveedor3(){
            return $this->tproveedor3;
        }

        public function setTProveedor3($tproveedor3){
            $this->tproveedor3 = $tproveedor3;
        }

        public function getProveedorFinal(){
            return $this->proveedorfinal;
        }

        public function setProveedorFinal($proveedorfinal){
            $this->proveedorfinal = $proveedorfinal;
        }
        
        public function getCosto(){
            return $this->costo;
        }

        public function setCosto($costo){
            $this->costo = $costo;
        }

        public function getCostofinal(){
            return $this->costofinal;
        }

        public function setCostofinal($costofinal){
            $this->costofinal = $costofinal;
        }

        public function getFechaPromesa(){
            return $this->fecha_promesa;
        }

        public function setFechaPromesa($fecha_promesa){
            $this->fecha_promesa = $fecha_promesa;
        }

        public function getNumGuia(){
            return $this->num_guia;
        }

        public function setNumGuia($num_guia){
            $this->num_guia = $num_guia;
        }

        public function getFechaLlegada(){
            return $this->fecha_llegada;
        }

        public function setFechaLlegada($fecha_llegada){
            $this->fecha_llegada = $fecha_llegada;
        }

        public function getComentarios(){
            return $this->comentarios;
        }

        public function setComentarios($comentarios){
            $this->comentarios = $comentarios;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
    }

?>