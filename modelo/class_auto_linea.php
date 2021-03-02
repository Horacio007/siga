<?php
    class auto_linea{

        private $id;
        private $id_marca;
        private $submarca;

        public function __construct($id = NULL, $id_marca = NULL, $submarca = NULL){
            $this->id = $id;
            $this->id_marca = $id_marca;
            $this->submarca = $submarca;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getIdMarca(){
            return $this->id_marca;
        }

        public function setIdMarca($id_marca){
            $this->id_marca = $id_marca;
        }

        public function getSubMarca(){
            return $this->submarca;
        }

        public function setSubMarca($submarca){
            $this->submarca = $submarca;
        }
    }

?>