<?php
    class aseguradora{
        
        private $id_aseguradora;
        private $nombre;

        public function __construct($id_aseguradora = NULL, $nombre = NULL){
            $this->id_aseguradora = $id_aseguradora;
            $this->nombre = $nombre;
        }

        public function getIdAseguradora(){
            return $this->id_aseguradora;
        }

        public function setIdAeguradora($id_aseguradora){
            $this->id_aseguradora = $id_aseguradora;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    }

?>