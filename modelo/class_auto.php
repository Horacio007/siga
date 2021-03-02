<?php
    class auto{

        private $id_auto;
        private $marca;

        public function __construct($id_auto = NULL, $marca = NULL){
            $this->id_auto = $id_auto;
            $this->marca = $marca;
        }

        public function getIdAuto(){
            return $this->id_auto;
        }

        public function setIdAuto($id_auto){
            $this->id_auto = $id_auto;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }
    }
?>