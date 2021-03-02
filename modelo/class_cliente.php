<?php
    class cliente{

        private $id;
        private $nombre;
        private $telefono;
        private $correo;

        public function __construct($id = NULL, $nombre = NULL, $telefono = NULL, $correo = NULL){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->correo = $correo;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getTelefono(){
            return $this->telefono;
        }

        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }

        public function getCorreo(){
            return $this->correo;
        }

        public function setCorreo($correo){
            $this->correo = $correo;
        }
    }
?>