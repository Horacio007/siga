<?php
    class asesores{
        private $id_asesor;
        private $id_aseguradora;
        private $nombre;
        private $a_paterno;
        private $a_materno;

        public function __construct($id_asesor = NULL, $id_aseguradora = NULL, $nombre = NULL, $a_paterno = NULL, $a_materno = NULL){
            $this->id_asesor = $id_asesor;
            $this->id_aseguradora = $id_aseguradora;
            $this->nombre = $nombre;
            $this->a_paterno = $a_paterno;
            $this->a_materno = $a_materno;
        }

        public function getIdAsesor(){
            return $this->id_asesor;
        }

        public function setIdAsesor($id_asesor){
            $this->id_asesor = $id_asesor;
        }

        public function getIdAseguradora(){
            return $this->id_aseguradora;
        }

        public function setIdAseguradora($id_aseguradora){
            $this->id_aseguradora = $id_aseguradora;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getA_paterno(){
            return $this->a_paterno;
        }

        public function setA_paterno($a_paterno){
            $this->a_paterno = $a_paterno;
        }

        public function getA_materno(){
            return $this->a_materno;
        }

        public function setA_materno($a_materno){
            $this->a_materno = $a_materno;
        }
    }
?>