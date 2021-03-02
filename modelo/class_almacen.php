<?php
    class almacen{

        private $id;
        private $id_vehiculo;
        private $fecha_llegada;
        private $aseguradora;
        private $descripcion;
        private $marca;
        private $linea;
        private $modelo;
        private $expediente;
        private $ubicacion;
        private $fecha_entrega;
        private $estatus;
        private $comentarios;

        public function __construct($id = NULL, $id_vehiculo = NULL, $fecha_llegada = NULL, $aseguradora = NULL, $descripcion = NULL, $marca = NULL, $linea = NULL, $modelo = NULL, $expediente = NULL, $ubicacion = NULL, $fecha_entrega = NULL, $estatus = NULL, $comentarios = NULL){
            $this->id = $id;
            $this->id_vehiculo = $id_vehiculo;
            $this->fecha_llegada = $fecha_llegada;
            $this->aseguradora = $aseguradora;
            $this->descripcion = $descripcion;
            $this->marca = $marca;
            $this->linea = $linea;
            $this->modelo = $modelo;
            $this->expediente = $expediente;
            $this->ubicacion = $ubicacion;
            $this->fecha_entrega = $fecha_entrega;
            $this->estatus = $estatus;
            $this->comentarios = $comentarios;
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

        public function getFecha_llegada(){
            return $this->fecha_llegada;
        }

        public function setFecha_llegada($fecha_llegada){
            $this->fecha_llegada = $fecha_llegada;
        }

        public function getAseguradora(){
            return $this->aseguradora;
        }

        public function setAseguradora($aseguradora){
            $this->aseguradora = $aseguradora;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
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

        public function getModelo(){
            return $this->modelo;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function getExpediente(){
            return $this->expediente;
        }

        public function setExpediente($expediente){
            $this->expediente = $expediente;
        }

        public function getUbicacion(){
            return $this->ubicacion;
        }

        public function setUbicacion($ubicacion){
            $this->ubicacion = $ubicacion;
        }

        public function getFecha_entrega(){
            return $this->fecha_entrega;
        }

        public function setFecha_entrega($fecha_entrega){
            $this->fecha_entrega = $fecha_entrega;
        }

        public function getEstatus(){
            return $this->estatus;
        }

        public function setEstatus($estatus){
            $this->estatus = $estatus;
        }

        public function getComentarios(){
            return $this->comentarios;
        }

        public function setComentarios($comentarios){
            $this->comentarios = $comentarios;
        }
    }
?>