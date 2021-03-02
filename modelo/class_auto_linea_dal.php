<?php
    include("class_auto_linea.php");
    include("class_conexion.php");

    class auto_linea_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function select_autos($marca){
            $select_all = "SELECT * FROM submarcav WHERE id_marca = '$marca' ORDER BY submarca ASC";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new auto_linea();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setId($row["id"]);
                $object->setIdMarca($row["id_marca"]);
                $object->setSubMarca($row["submarca"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function select_linea($id){
            $select_all = "SELECT submarca FROM submarcav WHERE id = '$id'";
            //print $select_all; exit;
    
            $this->set_sql($select_all);
            $this->db_conn->set_charset('utf8');
    
            $result = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $list = array();
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $object = new auto_linea();
    
                /*los nombres entre comillas son los nombres de las columnas de las tablas
                se usan los set para enviar el valor al objeto y con el get obtenemos el valor
                donde lo invoquemos*/
                $object->setSubMarca($row["submarca"]);
    
                $counter++;
                $list[$counter] = $object;
                unset($object);
            }
    
            return $list;
        }

        function insertLinea($id, $linea){
            $insert_linea = "INSERT INTO submarcav (id_marca, submarca) VALUES (";
            $insert_linea .= "'" . $id . "',";
            $insert_linea .= "'" . $linea . "')";

            $this->set_sql($insert_linea);
            $this->db_conn->set_charset('utf8');

            mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            if (mysqli_affected_rows($this->db_conn) == 1) {
                $inserted = 1;
            } else {
                $inserted = 0;
            }

            return $inserted;
        }

    }

?>