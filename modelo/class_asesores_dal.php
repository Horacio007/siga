<?php
    include("class_asesores.php");
    include("class_conexion.php");

    class asesores_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function select_asesores(){
            $select_all = "SELECT * FROM asesores";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new asesores();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setIdAsesor($row["id"]);
                $object->setIdAseguradora($row["id_aseguradora"]);
                $object->setNombre($row["nombre"]);
                $object->setA_paterno($row["a_paterno"]);
                $object->setA_materno($row["a_materno"]);
            
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function nombre_Asesor($id_asesor){
            $select_name = "SELECT nombre, a_paterno, a_materno FROM asesores WHERE id = '$id_asesor'";
            //print $select_all; exit;
    
            $this->set_sql($select_name);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new asesores();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setNombre($row["nombre"]);
                $object->setA_paterno($row["a_paterno"]);
                $object->setA_materno($row["a_materno"]);
            
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }
    }
?>