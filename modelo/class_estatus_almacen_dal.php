<?php
    include("class_estatus_almacen.php");
    include("class_conexion.php");

    class estatus_dal extends class_db{

        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function select_estatus(){
            $select_all = "SELECT * FROM estatusalmacen ORDER BY estatus ASC";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new estatus();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setEstatus($row["estatus"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function insert_refaccion(){
            
        }
    }

?>