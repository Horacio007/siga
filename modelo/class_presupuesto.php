<?php

    class presupuesto{

        private $id;
        private $id_vehiculo;
        private $op;
        private $nivel;
        private $concepto;
        private $momh;
        private $momp;
        private $momm;
        private $tot;
        private $tmomh;
        private $tmomp;
        private $tmomm;
        private $ttot;
        private $trefacciones;
        private $refacciones;
        private $subtotal;
        private $iva;
        private $total;
        private $fecha;

        public function __construct($id = NULL, $id_vehiculo = NULL, $op = NULL, $nivel = NULL, $concepto = NULL, $momh = NULL, $momp = NULL, $momm = NULL, $tot = NULL, $tmomh = NULL, $tmomp = NULL, $tmomm = NULL, $ttot = NULL, $trefacciones = NULL, $refacciones = NULL, $subtotal = NULL, $iva = NULL, $total = NULL, $fecha = NULL){
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->op = $op;
            $this->nivel = $nivel;
            $this->concepto = $concepto;
            $this->momh = $momh;
            $this->momp = $momp;
            $this->momm = $momm;
            $this->tot = $tot;
            $this->tmomh = $tmomh;
            $this->tmomp = $tmomp;
            $this->tmomm = $tmomm;
            $this->trefacciones = $trefacciones;
            $this->refacciones = $refacciones;
            $this->subtotal = $subtotal;
            $this->iva = $iva;
            $this->total = $total;
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

        public function getOp(){
            return $this->op;
        }

        public function setOp($op){
            $this->op = $op;
        }

        public function getNivel(){
            return $this->nivel;
        }

        public function setNivel($nivel){
            $this->nivel = $nivel;
        }

        public function getConcepto(){
            return $this->concepto;
        }

        public function setConcepto($concepto){
            $this->concepto = $concepto;
        }

        public function getMomh(){
            return $this->momh;
        }

        public function setMomh($momh){
            $this->momh = $momh;
        }

        public function getMomp(){
            return $this->momp;
        }

        public function setMomp($momp){
            $this->momp = $momp;
        }

        public function getMomm(){
            return $this->momm;
        }

        public function setMomm($momm){
            $this->momm = $momm;
        }

        public function getTot(){
            return $this->tot;
        }

        public function setTot($tot){
            $this->tot = $tot;
        }

        public function getTmomh(){
            return $this->tmomh;
        }

        public function setTmomh($tmomh){
            $this->tmomh = $tmomh;
        }

        public function getTmomp(){
            return $this->tmomp;
        }

        public function setTmomp($tmomp){
            $this->tmomp = $tmomp;
        }

        public function getTmomm(){
            return $this->tmomm;
        }

        public function setTmomm($tmomm){
            $this->tmomm = $tmomm;
        }

        public function getTtot(){
            return $this->ttot;
        }

        public function setTtot($ttot){
            $this->ttot = $ttot;
        }

        public function getTrefacciones(){
            return $this->trefacciones;
        }

        public function setTrefacciones($trefacciones){
            $this->trefacciones = $trefacciones;
        }

        public function getRefacciones(){
            return $this->refacciones;
        }

        public function setRefacciones($refacciones){
            $this->refacciones = $refacciones;
        }

        public function getSubTotal(){
            return $this->subtotal;
        }

        public function setSubTotal($subtotal){
            $this->subtotal = $subtotal;
        }

        public function getIva(){
            return $this->iva;
        }

        public function setIva($iva){
            $this->iva = $iva;
        }

        public function getTotal(){
            return $this->total;
        }

        public function setTotal($total){
            $this->total = $total;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
    }

?>