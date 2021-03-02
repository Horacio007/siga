<?php
    include("class_estatus.php");
    include("class_conexion.php");

    class estatus_dal extends class_db{

        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function select_estatus(){
            $select_all = "SELECT * FROM estatus ORDER BY status ASC";
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
                $object->setEstatus($row["status"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function updateEstatus($id, $estatus, $fecha){
            $update = 'UPDATE vehiculo SET ';
            $update .= "estatus = '$estatus', ";
            $update .= "fecha_salida_taller = '$fecha' ";
            $update .= "WHERE id = '$id'";

            //echo $update;

            $this->set_sql($update);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $output = 1;
            } else {
                $output = 0;
            }

            return $output;
        }
    }

?>