<?php
    include("class_conceptos_pagos.php");
    include("class_conexion.php");

    class conceptos_pagos_dal extends class_db{
        function __construct() {
            parent::__construct();
        }

        function __destruct() {
            parent::__destruct();
        }

        function select_cpagos(){
            $select_all = "SELECT * FROM conceptos_pagos ORDER BY concepto_pago ASC";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new conceptos_pagos();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setConcept_pago($row["concepto_pago"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

    }

?>