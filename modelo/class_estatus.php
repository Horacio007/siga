<?php
    class estatus{

        private $id;
        private $estatus;

        public function __construct($id = NULL, $estatus = NULL){
            $this->id = $id;
            $this->estatus = $estatus;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getEstatus(){
            return $this->estatus;
        }

        public function setEstatus($estatus){
            $this->estatus = $estatus;
        }
    }
?>